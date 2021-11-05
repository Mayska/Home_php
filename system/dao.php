<?php

/**
 * dao short summary.
 *
 * dao description.
 *
 * @version 1.0
 * @author alex
 */
interface dao
{
    function bddConnexion();
    function bddDeconnexion();
    function bddQuery($sql);
    function bddSave($sql);
    function bddList($sql);
}