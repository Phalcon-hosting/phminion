#!/bin/bash
DIR=`dirname $(readlink -f $0)`

if [ ! -w /etc/hosts ] ; then
   echo "Please run this script as sudo!";
   exit;
fi

if [ ! -r /root/.ssh/id_rsa ] ; then
    echo -e "\n\n\n" | ssh-keygen -t rsa -N "" -f /root/.ssh/id_rsa
fi

echo "--- Bootstrapping new Phalcon Hosting Minion ---"
sleep 1

# bootstrap salt
sudo sh ${DIR}/setup/salt.sh
