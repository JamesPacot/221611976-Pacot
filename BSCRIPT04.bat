@echo off

:mainmenu
echo.
echo Choose an operation:
echo 1. moveFiles
echo 2. deleteFiles
echo 3. listFiles
echo 4. Exit
choice /c 1234 /n /m "Enter your choice: "

if errorlevel 4 goto Exit
if errorlevel 3 goto listFiles
if errorlevel 2 goto deleteFiles
if errorlevel 1 goto moveFiles

echo Invalid choice, please try again.
goto :mainmenu

:moveFiles
echo Moving older text files to archive...
set sourceDir=C:\*.txt
set archiveDir=G:\archive
if not exist %archiveDir% mkdir %archiveDir%
move %sourceDir% %archiveDir%
echo Files moved to %archiveDir%.
goto :mainmenu

:listFiles
echo Listing archived files:
set archiveDir=G:\archive
dir %archiveDir%\*.txt
goto :mainmenu

:deleteFiles
echo.
echo Listing files in archive larger than 500KB:
set archiveDir=G:\archive
dir %archiveDir%\*.txt /S > archive_files.txt
echo.
echo Review the list and manually delete files larger than 500KB.
notepad archive_files.txt

set /p confirmDelete="Do you want to delete the listed files? (yes/no): "
if /i "%confirmDelete%"=="yes" (
    del /q %archiveDir%\*.txt
    echo Files deleted successfully.
) else (
    echo Deletion cancelled.
)
del archive_files.txt
goto :mainmenu

:exit
end
echo Goodbye!