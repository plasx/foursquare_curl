### OAUTH2 CURL PHP SQL FOURSQUARE APP

Application grabs your last checkin from Foursquare/Swarm and shows the Name and address of the place you were at. It uses OAuth2 to grab the token and stores it for later in a SQL database. If the token is invalid it will prompt you at the authorize.php page giving you the option to re-authenticate. Once authenticated the token is used for all future requests until it's invalidates. All of this is done using pure php & curl. No libraries here, feel free to fork it!

-Daniel Plas Rivera