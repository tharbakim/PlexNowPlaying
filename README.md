# PlexNowPlaying
A simple docker container used for grabbing the currently playing song and displaying the title informaton as a webpage (to be grabbed like programs such as Open Broadcaster Software)

## Setup
Setting up PlexNowPlaying requires you to configure the docker-compose.yml file and set two variables, ``PLEX_SERVER`` and ``MACHINE_IDENTIFIER``. To do this, you will need access to your Plex server's API.

``PLEX_SERVER`` is the address that your plex server is accessible at. You should be able to put a URL in your web browser and access your plex server - this is that address. Typically looks like ``192.168.1.1``.

``MACHINE_IDENTIFIER`` is the unique identifier for the machine you want PlexNowPlaying to pull information for. The best way to find this is to open the API in your browser, by going to ``PLEX_SERVER/status/sessions``. In Firefox, the page will look something like this:
![Firefox screenshot for finding the machine identifier](http://thar.xyz/images/27786ba.png)

Once you have set those two variables in the docker-compose.yml file, you can start the container with standard docker-compose methods.

``docker-compose up -d``

## Integrating with OBS

By default, PlexNowPlaying runs on port 3008. You can change this in the docker-compose.yml file, but this section assumes you have left it as 3008.

To show the information gathered by PlexNowPlaying in your OBS scene, add a "Browser" source to your scene. Point the URL to the docker container you just set up (usually something like, ``http://192.168.1.1:3008/``) and adjust the width/height as needed. I currently have mine set to 800 width and 18 height. Everything else you can leave as the default values, and click Ok.

Because PlexNowPlaying refreshes on a 5 second timer, it may take 5 seconds for the information to show up at first.

## Changes and Usage

Feel free to raise Pull Requests/Issues if you want to ask about a feature or suggest a change.

If you want to use PlexNowPlaying on your own stream, go right ahead. You don't owe me anything for doing so.
