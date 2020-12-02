# advent-of-code-2020

# CLI

Build:
```shell script
docker-compose build
```

Run:
```shell script
docker-compose run -w /opt/project php-cli php cli.php day1
```

Run with debugger:
```shell script
docker-compose run -w /opt/project -e XDEBUG_SESSION=xdebug_is_great -e PHP_IDE_CONFIG=serverName=advent-of-code php-cli php cli.php day2
```

# Xdebug

Make sure to set the Xdebug port to `9003`. (won't be needed when PHPStorm 2020.3 drops)

In `xdebug.ini` change `xdebug.client_host` to the IP address of your computer.

In PHPStorm go to Settings > Languages & Frameworks > PHP > Servers and create a new server called `advent-of-code`.
Setup the path mapping from your local directory to `/opt/project`.
