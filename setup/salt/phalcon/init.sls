phalcon:
  git.latest:
      - name: https://github.com/phalcon/cphalcon.git
      - rev: master
      - runas: root
      - target: /var/local/setup/cphalcon
      - force: true
      - require:
          - pkg: git
  cmd.wait:
   - name: sh install
   - cwd: /var/local/setup/cphalcon/build
   - watch:
     - git: phalcon


phalcon-ini:
    file.managed:
            - name: /etc/php5/conf.d/phalcon.ini
            - source: salt://templates/php/conf.d/phalcon.ini
            - template: jinja
            - user: www-data
            - group: www-data
            - mode: 755