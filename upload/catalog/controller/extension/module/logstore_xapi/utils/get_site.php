<?php
  function get_site($general) {

    return [[
      "id" => mb_ereg_replace('/$', '', $general['site_base']),
      "definition" => [
        "type" => "http://activitystrea.ms/schema/1.0/service",
        "name" => [
          $general['language_code'] => $general['config_name'],
        ],
      ],
      "objectType" => "Activity"
    ]];
  }
?>