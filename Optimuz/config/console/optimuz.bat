@echo off
title Optimuz Command Line Console

if not '%OPTIMUZ_PATH%' == '' goto set-enviroment
goto main-menu

:set-enviroment
cd %OPTIMUZ_PATH%
cls

:main-menu
echo This is the Optimuz Command Line Console (OCLC). This tool can be used to manage the framework and the applications.
echo.

if '%OPTIMUZ_PATH%' == '' (
echo.
echo ----------------------------------------------------------------------
echo ATTENTION!!
echo.
echo The enviroment variable OPTIMUZ_PATH is not defined. If you get errors you must define this variable in your system variables scope, or change the current working directory under option 5.2 "Set Enviroment - Change current working directory" to the directory where this bat file is located.
echo ----------------------------------------------------------------------
echo.
echo.
)

echo Choose an option by typing its number:
echo.
echo 1. Manage applications
echo 2. Generate map file
echo 3. Manage cache
echo 4. Manage threads
echo 5. Set enviroment
echo 0. Exit
echo.

set choice=
set /p choice=Type option number: 

if '%choice%' == '' goto invalid
if '%choice%' == '1' goto apps
if '%choice%' == '2' goto map
if '%choice%' == '3' goto cache
if '%choice%' == '4' goto threading
if '%choice%' == '5' goto env
if '%choice%' == '0' goto exit

:invalid
cls
goto main-menu

:apps
cls
echo Manage application
echo.
echo Choose an option by typing its number:
echo.
echo 1. Create new application
echo 2. Import application
echo 3. Export application
echo 4. Remove application
echo 5. Manage ORM
echo 0. Return
echo.

set choice=
set /p choice=Type option number: 

if '%choice%' == '1' goto create-app
if '%choice%' == '2' goto import-app
if '%choice%' == '3' goto export-app
if '%choice%' == '4' goto remove-app
if '%choice%' == '5' goto manage-orm
if '%choice%' == '0' goto invalid
goto apps

:get-app-name
set name=
set /p name=Type the application name: 

if '%name%' == '' goto invalid-app-name

goto continue-%app-option%

:invalid-app-name
echo.
echo.
echo You must provide a name for the application!
echo.
pause
goto apps

:create-app
cls
echo Manage application - Create
echo.
set app-option=create-app
goto get-app-name

:continue-create-app
echo.
echo.
php apps\manage.php create %name%
echo.
echo.
echo.
pause
cls
goto apps

:import-app
cls
echo Manage application - Import
echo.
set app-option=import-app
goto get-app-name

:continue-import-app
echo.
echo.
php apps\manage.php import %name%
echo.
echo.
echo.
pause
cls
goto apps

:export-app
cls
echo Manage application - Export
echo.
set app-option=export-app
goto get-app-name

:continue-export-app
echo.
echo.
php apps\manage.php export %name%
echo.
echo.
echo.
pause
cls
goto apps

:remove-app
cls
echo Manage application - Remove
echo.
set app-option=remove-app
goto get-app-name

:manage-orm
cls
echo Manage application - Manage ORM
echo.
set app-option=manage-orm
goto get-app-name

:continue-manage-orm
cls
echo %name% - Manage ORM
echo.
echo Choose an ORM engine by typing its number:
echo.
echo 1. Propel
echo 0. Return
echo.

set choice=
set /p choice=Type option number: 

if '%choice%' == '1' goto manage-propel
if '%choice%' == '0' goto apps
goto continue-manage-orm

:manage-propel
cls
echo %name% - Propel
echo.
echo Choose an option by typing its number:
echo.
echo 1. Update all (import schema from DBDesigner, update classes, insert SQL)
echo 2. Build/update classes
echo 3. Import schema from DBDesigner
echo 4. Create tables on database
echo 5. Dump data from database
echo 6. Insert data into database
echo 7. Import schema from database (reverse engineer)
echo 8. Create DDL SQL from schema
echo 0. Return
echo.

set choice=
set /p choice=Type option number: 
set currentDir=%cd%
set propelGen=%currentDir%\..\..\orm\Propel\generator\bin\propel-gen.bat

if '%choice%' == '1' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% dbd2propel
cmd.exe /c %propelGen%
cmd.exe /c %propelGen% insert-sql
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '2' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen%
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '3' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% dbd2propel
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '4' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% insert-sql
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '5' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% datadump
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '6' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% datasql
cmd.exe /c %propelGen% insert-sql
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '7' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% reverse
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '8' (
cd ../../apps/%name%/config/orm/Propel/
cmd.exe /c %propelGen% sql
cd %currentDir%
pause
goto manage-propel
)
if '%choice%' == '0' (
goto apps
)
else (
goto manage-propel
)

:continue-remove-app
echo.
echo.
php apps\manage.php remove %name%
echo.
echo.
echo.
pause
cls
goto apps

:map
echo.
echo.
echo Mapping files...
echo.
php mapping/mapFiles.php map
echo.
echo.
echo.
pause
cls
goto main-menu

:cache
cls
echo Manage chace
echo.
echo Choose an option by typing its number:
echo.
echo 1. Clear cache
echo 2. Show cached files
echo 3. Show cached data
echo 0. Return
echo.

set choice=
set /p choice=Type option number: 

if '%choice%' == '' goto cache
if '%choice%' == '1' goto clear-cache
if '%choice%' == '2' goto show-cached-files
if '%choice%' == '3' goto show-cached-data
if '%choice%' == '0' goto invalid

:clear-cache
echo.
echo.
php cache\manage.php clear
echo.
echo.
echo.
pause
cls
goto cache

:show-cached-files
echo.
echo.
php cache\manage.php show-files
echo.
echo.
echo.
pause
cls
goto cache

:show-cached-data
echo.
echo.
php cache\manage.php show-data
echo.
echo.
echo.
pause
cls
goto cache

:threading
cls
echo Manage threads
echo.
echo Choose an option by typing its number:
echo.
echo 1. Show available threads (threads running right now)
echo 2. Kill specific thread
echo 3. Kill all threads
echo 0. Return
echo.

set choice=
set /p choice=Type option number: 

if '%choice%' == '' goto threading
if '%choice%' == '1' goto show-threads
if '%choice%' == '2' goto choose-thread
if '%choice%' == '3' goto kill-threads
if '%choice%' == '0' goto invalid

:show-threads
echo.
echo.
php threading\manage.php show
echo.
echo.
echo.
pause
cls
goto threading

:choose-thread
cls
echo Manage threads - Kill thread
echo.
echo.
echo Type the thread index to remove. To know the thread index, first list all threads and see what is the index of the thread in the list.
echo.
echo Press enter without specifying a number to return to the threading menu.
echo.

set thread=
set /p thread=Type the thread index: 

if '%thread%' == '' goto threading

:::kill-thread
echo.
echo.
php threading\manage.php kill-thread %thread%
echo.
echo.
echo.
pause
cls
goto threading

:kill-threads
echo.
echo.
php threading\manage.php kill-threads
echo.
echo.
echo.
pause
cls
goto threading

:env
cls
echo Set enviroment
echo.
echo Choose an option by typing its number:
echo.
echo 1. Show current working directory
echo 2. Change current working directory
echo 0. Return
echo.

set choice=
set /p choice=Type option number: 

if '%choice%' == '1' goto show-cwd
if '%choice%' == '2' goto change-cwd
if '%choice%' == '0' goto invalid
goto env

:show-cwd
echo.
echo.
cd
echo.
echo.
pause
goto env

:change-cwd
cls
echo Set enviroment - Change current working directory
echo.

set newPath=
set pathDrive=

echo Press enter without specifying a path to return to the previous menu.
echo.
set /p newPath=Enter a full path for the new current working directory: 

if '%newPath%' == '' goto env

echo.

if not exist %newPath%\NUL (
echo The path you entered is invalid! The current working directory was not changed.
) else (
:get-drive-letter
for /F "tokens=1" %%D in ("%newPath%") do set pathDrive=%%~dD
if '%pathDrive%' == '' goto get-drive-letter

%pathDrive%
cd %newPath%
echo The current Path now is %newPath%
)

echo.
pause
goto env

:invalid-cwd
echo.
echo The path you entered is invalid! Check it and try again.
pause
goto env

:exit
exit