# WoW-Pserver-Launcher-Backend-Scripts
the web-backend for the pserver launcher. PHP scripts used for working with server from the launcher code.
Currently designed for working with a simple mangos server (mangos one). You can change the SQL commands inside the 
PHP scriptfiles to convert this to work with ANY WoW emulator. 

Features : 
- Parse server uptime
- Parse server players online counter
- Newsstream
- Account registration
- Administrator - Password reset and backup page to change passwords for other players quickly.
- Launcher updates
- Bugtracker with individual saving for bugreports and their attatchments. 
(saved bugtracker reports are getting saved as .txt and attatchments as .jpg files for security reasons)
- List of all GM and admin ingame commands for staff to help


Please make sure to set write permissions for the php files CHMOD 777
WARNING ! - The used scripts are not completely selfmade and have been barely secured against SQLInjections and other attacks please make sure to 
update them to the latest security standards otherwise i can guarantee security for you serversystem!)
