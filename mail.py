#!/usr/bin/python

import smtplib
from smtplib import SMTPException

sender = 'saurabh.shukla053@gmail.com'
receivers = ['saurabh.shukla@prudigital.in']
message = "Hello!"

try:
    session = smtplib.SMTP('smtp.gmail.com',587)
    session.ehlo()
    session.starttls()
    session.ehlo()
    session.login(sender,'password')
    session.sendmail(sender,receivers,message)
    session.quit()
except SMTPException as e:
    print(e)

#https://myaccount.google.com/u/1/lesssecureapps - less secure app k liye off