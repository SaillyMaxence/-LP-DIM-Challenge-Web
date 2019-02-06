<?php
    class LDAP
    {
        private $con = "false";

        public function Connexion($addr,$port)
        {
            $this->_con = ldap_connect("10.10.28.101",389);
            ldap_set_option($this->_con, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($this->_con, LDAP_OPT_REFERRALS, 0);

            if($this->_con)
                return true;
            else
                return false;
        }

        public function VerifUser($user,$password)
        {
            $basedn = "uid=".$user.",ou=Users,dc=iutcb,dc=univ-littoral,dc=fr";

            if($this->_con)
            {
                if(ldap_bind($this->_con,$basedn,$password))
                {
                    return true;
                }else
                    return false;
            }else
                return false;
        }

        public function VerifUserGroup($user,$password,$group)
        {
            if($this->_con)
            {
                if($this->VerifUser($user,$password))
                {
                    $basedn = "ou=Groups,dc=iutcb,dc=univ-littoral,dc=fr";
                    $filter = "(cn=".$group.")";
                    $recherchegroupe = ldap_search($this->_con, $basedn, $filter,array("memberuid"));
                    $resultatgroupe = ldap_get_entries($this->_con,$recherchegroupe);
                    foreach($resultatgroupe[0]['memberuid'] as $name)
                    {
                        if($name == $user)
                        {
                            return true;
                        }
                    }
                    return false;
                }
                else
                {
                    return false;
                }
            }else
                return false;
        }

    }