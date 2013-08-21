#!/bin/bash
echo "Phalcon Hosting Minion Role Provisioner"
echo
DIR=`dirname $(readlink -f $0)`
SILENT=false
ROLE=false

assign_role() {

    echo "ASSIGNING ROLE ${ROLE}..."
    salt-call --local grains.setval role ${ROLE}

    # run salt again with the new role
    salt-call --local state.highstate -l debug
}

helpopts() {
    echo 'Available options: '
    echo
    echo "-r [database|memcache|webserver] - Assign a role"
    echo "-s run this script silent"
}

while getopts ":as-helpr:" opt; do
  case $opt in
    s)
      echo "Running in silent mode"
      SILENT=true
      ;;
    r)
      case $OPTARG in
        'webserver'|'memcache'|'database')
            ROLE=$OPTARG
            ;;
        *)
            echo
            echo '>>> Invalid role!'
            helpopts
            exit
            ;;
         esac
      ;;
      h|'-help')
        #show help
        helpopts
        exit
      ;;
    \?)
      echo "Invalid option: -$OPTARG" >&2
      ;;
  esac
done

if [ ${ROLE} = false ] ; then
    helpopts
    exit
fi


if [ ! -w /etc/hosts ] ; then
   echo "Please run this script as sudo!";
   exit;
fi


echo "--- Adding new role ${ROLE} ---"
echo
sleep 1

if [ ! ${SILENT} = true ] ; then

    read -r -p "Are you sure? You cannot remove a role! [Y/n] " response
    case ${response} in
        [yY][eE][sS]|[yY]|'')
            assign_role
            echo
            ;;
        *)
            echo 'Cancelled by user'
            exit
            ;;
    esac
else
    assign_role
fi