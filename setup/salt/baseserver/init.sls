basepackages:

  pkg.installed:
    - pkgs:
      - nginx
      - htop
      - php5-cli
      - php5-dev
      - php5-mysql
      - php5-mcrypt
      - php5-memcached
      - php5-memcache
      - php5-curl
      - nmap
      - unzip
      - make
      - automake
      - curl
      - rsync
      - git
      - git-flow

phalcon:
  git.latest:
      - name: https://github.com/phalcon/cphalcon.git
      - rev: master
      - runas: root
      - target: /var/local/setup/cphalcon
      - force: true
  cmd.wait:
   - name: sh install
   - cwd: /var/local/setup/cphalcon/build
   - watch:
     - git: phalcon


removepackages:
  pkg.purged:
      - pkgs:
        - apache2

php5-cli:
    file.managed:
        - name: /etc/php5/cli/php.ini
        - source: salt://templates/php/php.ini
        - template: jinja
        - user: www-data
        - group: www-data
        - mode: 755

phalcon-ini:
    file.managed:
            - name: /etc/php5/conf.d/phalcon.ini
            - source: salt://templates/php/conf.d/phalcon.ini
            - template: jinja
            - user: www-data
            - group: www-data
            - mode: 755