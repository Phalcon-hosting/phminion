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
    mkdir ${SALT_DIR}/pillar

    cp -R ${DIR}/salt/. ${SALT_DIR}/
    cp -R ${DIR}/templates/* ${SALT_DIR}/templates
    cp -R ${DIR}/pillar/* ${SALT_DIR}/pillar
}

randpass() {
echo `</dev/urandom tr -dc A-Za-z0-9 | head -c16`
}

minimum_pillar() {
 mkdir ${SALT_DIR}/pillar/database
    #this creates the minimum salt pillar for local usage (random mysql password)
    echo "
dbuser: phminion
dbpass: $(randpass)" > ${SALT_DIR}/pillar/database/init.sls

}
# get salt
get_bootstrap

# copy the salt files
copy_salt_files

# setup the minimum pillar information
minimum_pillar

# run salt
salt-call --local state.highstate -l debug