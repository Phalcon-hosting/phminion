#!/bin/bash
DIR=`dirname $(readlink -f $0)`

bootstrap() {
    if [ ! -r /root/.ssh/id_rsa ] ; then

        if [ ! -r /etc/ssh/ssh_known_hosts ] ; then
            ssh-keyscan -H github.com > /etc/ssh/ssh_known_hosts
        fi

        # if the id_rsa does exists, create one and re-run the script (to be sure the files are created)
        echo -e "\n\n\n" | ssh-keygen -t rsa -N "" -f /root/.ssh/id_rsa
        sudo sh ${DIR}/bootstrap.sh
        exit
    fi
}
if [ ! -w /etc/hosts ] ; then
   echo "Please run this script as sudo!";
   exit;
fi

# run the initial bootstrapping
bootstrap

echo "--- Bootstrapping new Phalcon Hosting Minion ---"
sleep 1

# bootstrap salt
sudo sh ${DIR}/setup/salt.sh

if [ -r /etc/php5/cli/php.ini ] ; then
    php -i |grep phalcon
fi
