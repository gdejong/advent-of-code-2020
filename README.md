# advent-of-code-2020

# CLI

Build:
```shell script
docker-compose build
```

Run:
```shell script
docker-compose run -w /opt/project php-cli php cli.php day1:part1
```

# Xdebug

Make sure to set the Xdebug port to `9003`. (won't be needed when PHPStorm 2020.3 drops)

In `xdebug.ini` change `xdebug.client_host` to the IP address of your computer.
