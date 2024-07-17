@echo off

:mainmenu

echo Select a Windows utility to execute:
echo 1. ipconfig
echo 2. tasklist/taskkill
echo 3. chkdsk
echo 4. format
echo 5. defrag
echo 6. find
echo 7. attrib
echo 8. Exit

choice /c 1234567 /n /m "Choose a number from 1-7: "

if errorlevel 8 goto Exit
if errorlevel 7 goto attrib
if errorlevel 6 goto find
if errorlevel 5 goto defrag
if errorlevel 4 goto format
if errorlevel 3 goto chkdsk
if errorlevel 2 goto tasklist
if errorlevel 1 goto ipconfig

echo invalid choice please only select a number from 1-7.
goto :mainmenu

:ipconfig
ipconfig
goto :mainmenu

:tasklist
set /p action="Enter tasklist or taskkill: "
if /i "%action%"=="tasklist" (
    tasklist
) else if /i "%action%"=="taskkill" (
    set /p id="Enter the ID of the process to kill: "
    taskkill %id% /f
) else (
    echo Invalid action. Please enter 'tasklist' or 'taskkill'.
)
goto :mainmenu

:chkdsk
chkdsk
goto :mainmenu


:format
set /p drive="Enter the drive name to format: "
set /p confirm="Are you sure you want to format %drive%? (yes/no): "
if /i "%confirm%"=="yes" (
    format %drive%
) else (
    echo Format operation cancelled.
)
goto :mainmenu

:defrag
/d
goto :mainmenu

:find
set /p keyword="Enter the keyword to search for: "
set /p file="Enter the file to search within: "
findstr /i /c:"%keyword%" "%file%"
goto :mainmenu

:attrib
set /p file="Enter the file path to change attributes: "
attrib "%file%"
goto :mainmenu

:Exit
end
echo Goodbye!

