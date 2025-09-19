✅ Steps to test and fix

Check locally first (same PC):
Open browser on your XAMPP computer and try:

http://192.168.18.14:80/

or (if you’re using port 8080):

http://192.168.18.14:8080/

If it loads → Apache is bound correctly.
If not → Apache may still be listening only on localhost.

Update Apache config (httpd.conf):

Open:

C:\xampp\apache\conf\httpd.conf

Find this line:

Listen 80
or
Listen 8080

Make sure it’s:

Listen 0.0.0.0:80
(or 8080 if that’s your port).

Also find:

ServerName localhost:80

Change to:

ServerName 192.168.18.14:80

(use 8080 if needed).

Save file, restart Apache in XAMPP.

Allow Apache in Firewall:

Open Windows Defender Firewall → Advanced settings.

Add a new Inbound Rule:

Port → TCP → 80 (or 8080) → Allow.

Or allow httpd.exe through the firewall.

Access from another device on the same Wi-Fi:
On your phone/laptop (connected to the same network), open:

http://192.168.18.14/


(or add :8080 if that’s your port).
