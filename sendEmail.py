import smtplib
from email.message import EmailMessage


def email_alert(subject, body, to):
    msg = EmailMessage()
    msg.set_content(body)
    msg['subject'] = subject
    msg['to'] = to
    

    user = "catudiochristianjude@gmail.com"
    msg['from'] = user
    password = "tndvivkjuxyfqpjk"

    server = smtplib.SMTP("smtp.gmail.com", 587)
    server.starttls();
    server.login(user, password)
    server.send_message(msg)
    server.quit();

if __name__ == '__main__':
    emailTxt = "judecatudio15@gmail.com"
    email1 = "catudio.christianjude.j.7987@gmail.com"
    email2 = ""
    email_alert("Sample email","Hi!", email1)
    print("email send")