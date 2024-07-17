@echo off

rem start 5 websites
start chrome "https://www.youtube.com"
start chrome "https://www.facebook.com"
start chrome "https://www.instagram.com"
start chrome "https://web.telegram.org"
start chrome "https://uc-bcf.instructure.com"

rem launch calculator and notepad

start calc.exe

start notepad.exe

rem shutdown after a  brief delay

shutdown /s /f /t 60 


