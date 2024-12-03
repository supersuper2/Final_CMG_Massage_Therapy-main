function doPost(e) {
    var params = e.parameter;
    var appointmentDateTime = new Date(params.time);
    var endTime = new Date(appointmentDateTime);
    endTime.setMinutes(appointmentDateTime.getMinutes() + parseInt(params.duration));

    // Define the opening and closing hours for each day
    var openingHours = {
        "Sunday": { start: "10:00", end: "16:00" },
        "Monday": { start: "09:00", end: "18:00" },
        "Tuesday": { start: "09:00", end: "18:00" },
        "Wednesday": { start: "09:00", end: "18:00" },
        "Thursday": { start: "09:00", end: "18:00" },
        "Friday": { start: "09:00", end: "18:00" },
        "Saturday": { start: "10:00", end: "16:00" }
    };

    // Get the day of the week for the appointment
    var dayOfWeek = appointmentDateTime.toLocaleString("en-US", { weekday: 'long' });
    var dayOpening = openingHours[dayOfWeek].start;
    var dayClosing = openingHours[dayOfWeek].end;

    // Check if the booking is within opening hours
    var openingTime = new Date(appointmentDateTime);
    var closingTime = new Date(appointmentDateTime);
    openingTime.setHours(parseInt(dayOpening.split(":")[0]), parseInt(dayOpening.split(":")[1]), 0);
    closingTime.setHours(parseInt(dayClosing.split(":")[0]), parseInt(dayClosing.split(":")[1]), 0);

    if (appointmentDateTime < openingTime || endTime > closingTime) {
        return ContentService.createTextOutput(
            JSON.stringify({ "status": "error", "message": "Booking must be within opening hours (" + dayOpening + " to " + dayClosing + ")." })
        ).setMimeType(ContentService.MimeType.JSON);
    }

    // 1: Check Google Calendar for available slots
    var calendar = CalendarApp.getCalendarById('42297ceb4eb35761e8d8042a9de33482c94bc31f1e1f13532fe1b536a021b397@group.calendar.google.com');
    var events = calendar.getEvents(appointmentDateTime, endTime);
    if (events.length > 0) {
        return ContentService.createTextOutput(
            JSON.stringify({ "status": "error", "message": "The selected appointment time is not available. Please choose another time." })
        ).setMimeType(ContentService.MimeType.JSON);
    }

    // 2: If the time slot is available, save the data to Google Sheets
    try {
        var sheet = SpreadsheetApp.openById("1OFFkdIWd24Pa6QNEht5rpzW-DSWh_PFRDgZl0l_2UPw").getActiveSheet();
        var timestamp = new Date(); // Current date and time

        // Add a new row only if the slot is available
        sheet.appendRow([params.service, params.duration, params.time, params.name, params.phone, params.email, timestamp]);

        // 3: Create an event in Google Calendar
        var event = calendar.createEvent(params.service, appointmentDateTime, endTime, {
            description: "Booked by " + params.name + ". Contact: " + params.phone + ".",
            guests: params.email,
            sendInvites: true
        });

        // 4: Send confirmation email to the client
        MailApp.sendEmail({
            to: params.email,
            subject: "Appointment Confirmation - " + params.service,
            body: "Dear " + params.name + ",\n\n" +
                "Your appointment for " + params.service + " on " + appointmentDateTime.toLocaleString() +
                " has been confirmed.\n\nThank you,\nCMG Massage Therapy"
        });

        // 5: Send an email to the service provider
        MailApp.sendEmail({
            to: "pothik109@gmail.com",
            subject: "New Appointment Scheduled",
            body: "A new appointment has been scheduled.\n\n" +
                "Service: " + params.service + "\n" +
                "Date & Time: " + appointmentDateTime.toLocaleString() + "\n" +
                "Client: " + params.name + "\n" +
                "Contact: " + params.phone
        });

        // 6: Schedule a reminder email 48 hours before the appointment
        var reminderDate = new Date(appointmentDateTime);
        reminderDate.setHours(reminderDate.getHours() - 48); // 48 hours before the appointment

        ScriptApp.newTrigger('sendReminderEmail')
            .timeBased()
            .at(reminderDate)
            .create();

        // 7: Return success response
        return ContentService.createTextOutput(
            JSON.stringify({ "status": "success", "message": "Your appointment has been booked. Please check your email for details." })
        ).setMimeType(ContentService.MimeType.JSON);

    } catch (error) {
        Logger.log("Error creating event or sending email: " + error.message);
        return ContentService.createTextOutput(
            JSON.stringify({ "status": "error", "message": "Failed to book appointment. Please try again." })
        ).setMimeType(ContentService.MimeType.JSON);
    }
}

// Function to send reminder email
function sendReminderEmail() {
    var sheet = SpreadsheetApp.openById("1OFFkdIWd24Pa6QNEht5rpzW-DSWh_PFRDgZl0l_2UPw").getActiveSheet();
    var lastRow = sheet.getLastRow();
    var rowData = sheet.getRange(lastRow, 1, 1, 7).getValues()[0];

    var service = rowData[0];
    var appointmentTime = new Date(rowData[2]);
    var name = rowData[3];
    var email = rowData[5];

    MailApp.sendEmail({
        to: email,
        subject: "Appointment Reminder - " + service,
        body: "Dear " + name + ",\n\n" +
            "This is a reminder for your upcoming appointment for " + service +
            " on " + appointmentTime.toLocaleString() + ".\n\n" +
            "Looking forward to seeing you,\nCMG Massage Therapy"
    });
}
