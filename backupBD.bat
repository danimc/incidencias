echo off
“C:\xampp\mysql\bin\mysqldump.exe” -hlocalhost -uroot crm > BackUpBD_%Date:~6,4%%Date:~3,2%%Date:~0,2%_.sql
exit