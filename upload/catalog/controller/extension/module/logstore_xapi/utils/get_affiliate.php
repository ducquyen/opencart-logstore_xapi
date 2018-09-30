<?php
  function get_affiliate($affiliate_id, $general) {

    if(!$affiliate_id) return [];

    // get the affiliate from the DB
    $affiliate_row = $general['db']->query("
      SELECT firstname, lastname " .
      "FROM `" . DB_PREFIX . "affiliate` " .
      "WHERE affiliate_id='" . $general['db']->escape($affiliate_id) . "'"
    )->row;

    if(!$affiliate_row) {
      echo "    Missing affiliate row with id " . $affiliate_id . ".\n";
      return [];
    }

    return [
      "http://id.tincanapi.com/extension/training-provider" => [
      // or https://w3id.org/xapi/acrossx/extensions/school
      // or http://id.tincanapi.com/extension/referrer
        "affiliate_id" => $affiliate_id,
        "affiliate_name" => trim($affiliate_row['firstname'] . ' ' . $affiliate_row['lastname']),
      ],
    ];
  }
?>