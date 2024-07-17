@echo off

:mainmenu

echo Types of shapes:
echo 1. Circle
echo 2. Triangle
echo 3. Quadrilateral

choice /c 123 /n /m "Select a shape:"

if errorlevel 3 goto Quadrilateral
if errorlevel 2 goto Triangle
if errorlevel 1 goto Circle
echo invalid choice, please select 1, 2, or 3.
goto :mainmenu

:Quadrilateral
set /p length="Enter the length:"
set /p width="Enter the width:"
set /a area=length * width
echo The area of the quadrilateral is %area% square units.

rem Sa part na toh sir di ko magets bat ndi nya ina-indentify
rem ung type ng quadrilateral

if %length%==%width% (
    echo The quadrilateral is a square
) else (
    if %length% gtr %width% (
        echo The quadrilateral is a rectangle
    )
)
goto :mainmenu

:Triangle
set /p S1="Enter side 1:"
set /p S2="Enter side 2:"
set /p S3="Enter side 3:"

rem heron's formula
set /a s=(S1 + S2 + S3) / 2
set /a area=s * (s - S1) * (s - S2) * (s - S3)
echo The area of the triangle is %area% square units.

rem Sa part na toh sir di ko rin magets bat ndi nya ina-indentify
rem ung type triangle

if %S1%==%S2% if %S2%==%S3% (
    echo The triangle is Equilateral
) else (
    if %S1%==%S2% if not %S2%==%S3% (
        echo The triangle is Isosceles
    )
    if %S2%==%S3% if not %S2%==%S1% (
        echo The triangle is Isosceles
    )
    if %S1%==%S3% if not %S1%==%S2% (
        echo The triangle is Isosceles
    )
    if not %S1%==%S2% if not %S2%==%S3% if not %S1%==%S3% (
        echo The triangle is Scalene
    )
)
goto :mainmenu

:Circle
set /p radius="Enter a value for radius:"
set /a area=31416 * radius * radius / 10000
echo The area of the Circle is %area% square units.
goto :mainmenu