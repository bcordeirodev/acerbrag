#!/bin/bash

# this function presents the first menu
function mainMenu
{
	clear
	echo -e "This is the Optimuz Command Line Console (OCLC). This tool can be used to manage the framework and the applications.\n"
	echo -e "Choose an option by typing its number:\n"
	echo "1. Manage applications"
	echo "2. Generate map file"
	echo "3. Manage cache"
	echo "4. Manage threads"
	echo "5. Set enviroment"
	echo -e "0. Exit\n"
	echo -n "Type option number: "

	# read user input
	read -n 1 choice

	case "$choice" in
		"1")
			manageApps
			;;
		"2")
			mapFile
			;;
		"3")
			manageCache
			;;
		"4")
			manageThreads
			;;
		"5")
			setEnviroment
			;;
		"0")
			clear
			exit
			;;
		*)
			mainMenu
			;;
	esac
}

# this function presents the menu of the applications management system
function manageApps
{
	clear
	echo -e "Manage applications\n"
	echo -e "Choose an option by typing its number:\n"
	echo "1. Create new application"
	echo "2. Import application"
	echo "3. Export application"
	echo "4. Remove application"
	echo "5. Manage ORM"
	echo -e "0. Return\n"
	echo -n "Type option number: "

	# read user input
	read -n 1 choice
	echo -e "\n"

	case "$choice" in
		"1")
			getAppName "Manage applications - Create\n"
			php apps/manage.php "create" "$appName"
			read -n 1
			manageApps
			;;
		"2")
			getAppName "Manage applications - Import\n"
			php apps/manage.php "import" "$appName"
			read -n 1
			manageApps
			;;
		"3")
			getAppName "Manage applications - Export\n"
			php apps/manage.php "export" "$appName"
			read -n 1
			manageApps
			;;
		"4")
			getAppName "Manage applications - Remove\n"
			php apps/manage.php "remove" "$appName"
			read -n 1
			manageApps
			;;
		"5")
			getAppName "Manage applications - Manage ORM\n"
			manageORM
			;;
		"0")
			mainMenu
			;;
		*)
			manageApps
			;;
	esac
}

appName=

# gets the application's name
function getAppName
{
	clear
	echo -e $1
	echo -n "Type the application name: "
	read name

	if [ "$name" = "" ]; then
		echo -e "\nYou must provide a name for the application!\n"
		read -n 1
		manageApps
	else
		appName=$name
	fi
}

# this function generates the map file
function mapFile
{
	echo -e "\n\nMapping files...\n"
	php mapping/mapFiles.php
	read -n 1
	mainMenu
}

# this function presents the menu of the cache management system
function manageCache
{
	clear
	echo -e "Manage cache\n"
	echo -e "Choose an option by typing its number:\n"
	echo "1. Clear cache"
	echo "2. Show cached files"
	echo "3. Show cached data"
	echo -e "0. Return\n"
	echo -n "Type option number: "

	# read user input
	read -n 1 choice
	echo -e "\n"

	case "$choice" in
		"1")
			php cache/manage.php "clear"
			read -n 1
			manageCache
			;;
		"2")
			php cache/manage.php "show-files"
			read -n 1
			manageCache
			;;
		"3")
			php cache/manage.php "show-data"
			read -n 1
			manageCache
			;;
		"0")
			mainMenu
			;;
		*)
			manageCache
			;;
	esac
}

# this function presents the menu of the threads management system
function manageThreads
{
	clear
	echo -e "Manage threads\n"
	echo -e "Choose an option by typing its number:\n"
	echo "1. Show available threads (threads running right now)"
	echo "2. Kill specific trhead"
	echo "3. Kill all threads"
	echo -e "0. Return\n"
	echo -n "Type option number: "

	# read user input
	read -n 1 choice
	echo -e "\n"

	case "$choice" in
		"1")
			php threading/manage.php show
			read -n 1
			manageThreads
			;;
		"2")
			killThread
			;;
		"3")
			php threading/manage.php "kill-threads"
			read -n 1
			manageThreads
			;;
		"0")
			mainMenu
			;;
		*)
			manageThreads
			;;
	esac
}

# this function is used to kill a specific thread
function killThread
{
	echo -e "\n\nType the thread index to remove. To know the thread index, first list all threads and see what is the index of the thread in the list.\n"
	echo -e "Press enter without specifying a number to return to the threading menu.\n"
	echo -n "Type the thread index: "
	read -n 2 index
	echo ""

	if [ $index != "" ]; then
		php threading/manage.php "kill-thread" "$index"
		read -n 1
	fi

	manageThreads
}

# this function presents the menu of the enviroment options
function setEnviroment
{
	clear
	echo -e "Set enviroment\n"
	echo -e "Choose an option by typing its number:\n"
	echo "1. Set default enviroment"
	echo -e "0. Return\n"
	echo -n "Type option number: "

	# read user input
	read -n 1 choice
	echo -e "\n"

	case "$choice" in
		"1")
			php enviroment/install.php
			read -n 1
			setEnviroment
			;;
		"0")
			mainMenu
			;;
		*)
			setEnviroment
			;;
	esac
}

# this function presents the menu of the ORM management system
function manageORM
{
	clear
	echo -e "$appName - Manage ORM\n"
	echo -e "Choose an ORM engine by typing its number:\n"
	echo "1. Propel"
	echo -e "0. Return\n"
	echo -n "Type option number: "

	# read user input
	read -n 1 choice
	echo -e "\n"

	case "$choice" in
		"1")
			propelManager
			;;
		"0")
			manageApps
			;;
		*)
			manageORM
			;;
	esac
}

# this function presents the menu of the Propel management system
function propelManager
{
	clear
	echo -e "$appName - Propel\n"
	echo -e "Choose an option by typing its number:\n"
	echo "1. Update all (import schema from DBDesigner, update classes, insert SQL)"
	echo "2. Build/update classes"
	echo "3. Import schema from DBDesigner"
	echo "4. Create tables on database"
	echo "5. Dump data from database"
	echo "6. Insert data into database"
	echo "7. Import schema from database (reverse engineer)"
	echo "8. Create DDL SQL from schema"
	echo -e "0. Return\n"
	echo -n "Type option number: "

	currentDir=`pwd`
	propelGen="$currentDir/../../orm/Propel/generator/bin/propel-gen"

	# read user input
	read -n 1 choice
	echo -e "\n"

	case "$choice" in
		"1")
			cd "../../apps/$appName/config/orm/Propel/"
			#$propelGen datadump
			$propelGen dbd2propel
			$propelGen
			#$propelGen datasql
			$propelGen insert-sql
			cd $currentDir
			read -n 1
			propelManager
			;;
		"2")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen
			cd $currentDir
			read -n 1
			propelManager
			;;
		"3")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen dbd2propel
			cd $currentDir
			read -n 1
			propelManager
			;;
		"4")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen insert-sql
			cd $currentDir
			read -n 1
			propelManager
			;;
		"5")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen datadump
			cd $currentDir
			read -n 1
			propelManager
			;;
		"6")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen datasql
			$propelGen insert-sql
			cd $currentDir
			read -n 1
			propelManager
			;;
		"7")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen reverse
			cd $currentDir
			read -n 1
			propelManager
			;;
		"8")
			cd "../../apps/$appName/config/orm/Propel/"
			$propelGen sql
			cd $currentDir
			read -n 1
			propelManager
			;;
		"0")
			manageORM
			;;
		*)
			propelManager
			;;
	esac
}

mainMenu
