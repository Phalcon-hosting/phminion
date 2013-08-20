#!/bin/bash

if [ ! -w /etc/hosts ] ; then
   echo "Please run this script as sudo!";
   exit;
fi
DIR=`dirname $(readlink -f $0)`
SALT_DIR="/srv/salt"

get_bootstrap(){
    wget -O - http://bootstrap.saltstack.org | sudo sh
}

copy_salt_files(){

    # make the salt-dir and
    mkdir ${SALT_DIR}
    mkdir ${SALT_DIR}/templates

    cp -R ${DIR}/salt/. ${SALT_DIR}/
    cp -R ${DIR}/templates/* ${SALT_DIR}/templates
}

# get salt
get_bootstrap

# copy the salt files
copy_salt_files

# run salt
salt-call --local state.highstate -l debug