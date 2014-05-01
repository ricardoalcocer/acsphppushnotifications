# ACS PHP Push Notifications

Small, reusable PHP script/web service to send ACS cross-platform push notifications.  Simply host this script and you can call it from your web, desktop and even mobile apps.  

If you're looking for a way of activating Push Notifications in your Titanium apps, take a look at my [ACS Push Notifications CommonJS Module](https://github.com/ricardoalcocer/acspushmod).

> This script supports iOS and Android.  To send to Blackberry devices, you can use [this script](https://github.com/pec1985/BB10-Push-Server) by [Pedro Enrique](https://github.com/pec1985).

# Usage

Simply host it and call it via HTTP GET or POST (I recommend post).  The script receives the following arguments:

* acskey - ACS development or production API Key
* acsuid - ACS User Name
* acspwd - ACS Password
* to_ids - Id(s) of users to send notification to (defaults to everyone)
* channel - Channel to send to
* title - The message title
* message - The actual message

# Credits

Credit goes to [patrickjongmans](http://twitter.com/patrickjongmans) for the original script posted on the [Appcelerator Q&A](http://developer.appcelerator.com/question/140589/how-to-send-push-notifiaction-to-android-using-php-controled-acs-#254798).

# License

MIT - [http://alco.mit-license.org](http://alco.mit-license.org)

# Other
You can also [send ACS Push Notifications with Perl](http://ulizama.com/2014/05/using-perl-to-send-acs-push-notifications/).