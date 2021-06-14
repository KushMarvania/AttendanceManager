# AttendanceManager
Marko is an app to get attendance of a class  present in LAN (Local Area Network). It is basically a web app that can be hosted in router present in classroom environment.
For front-end HTML, CSS and JavaScript is used and for the back-end part PHP is coupled with MySQL.
Finally JAVA is used to create a WebView application in android studio.

# Advances / How it Works
1. Since, this is a LAN based system you can be sure that attendace can be marked only in that network.
2. Faculty can start a session by logging into the system anytime during a lecture.
3. This sessions could be activated till the desired time untill it's deactivated, a random pin will be generated for each new session.
4. Students can enter the session pin while the session is still active, this will mark their attendace in record.
5. Now to avoid duplicates- user can mark only one attendance for a session and same mobile device can only be used to mark the attendance for a user for multiple users. 

# ToDo
1. Change the DHCP lease time (assigning internal IP using MAC Address) of the router to 12-16 hrs something, so that a user can change the mobile device to mark the attendance some other day in case.
2. For sign up, admin needs to add the data to the database for faculties (including subject details) while students can register for themselves.
3. You could add a auto-email authentication to the system. But, in case your mail ID's from university/institution does not support mail from other ID's you have to INSERT all the valid email (student's email) in "valid_email" TABLE.
