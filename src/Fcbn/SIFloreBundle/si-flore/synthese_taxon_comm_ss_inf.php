﻿<?php
$dbconn = pg_connect("host=94.23.218.10 port=5432 dbname=si_flore_national_v3 user='".$_SERVER['PHP_AUTH_USER']."' password=pUErwasrvIDMrUa");
$requete = "--synthese taxon comm ss inf
SELECT syn.cd_ref, syn.nom_complet, nb_obs, nb_obs_1500_1980, nb_obs_1981_2000, nb_obs_2001_2013, nb_obs_averee, nb_obs_interpretee, date_premiere_obs, date_derniere_obs
    FROM exploitation.synthese_taxon_comm syn
    WHERE cd_ref = '".$_GET['cd_ref']."';";
$result = pg_query($dbconn,$requete);
while ($row = pg_fetch_object($result)) {
$json_rows[] = $row;
}
$header = '{success: true, rows: ';
$footer = '}';
echo $header . json_encode($json_rows) . $footer;
?>