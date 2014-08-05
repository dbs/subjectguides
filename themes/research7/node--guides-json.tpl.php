<?php
  global $language;
  global $base_url;

  /* Get all research guides that have been published in the requested language */
  $result = db_query("
    SELECT n.title, ua.alias, n.nid, ttd.name
    FROM {node} n
      INNER JOIN {url_alias} ua ON ua.source = CONCAT('node/', n.nid)
      INNER JOIN {taxonomy_index } ti ON ti.nid = n.nid
      INNER JOIN {taxonomy_term_data} ttd ON ti.tid = ttd.tid
    WHERE n.type = 'panels_sub_guide'
      AND (n.language = :language OR n.language = 'und')
      AND (ua.language = :language OR ua.language = 'und')
      AND n.status = 1
      ORDER BY n.title ASC
    ", array(':language' => $language->language)
  );

  foreach ($result as $i) {
    $nid = $i->nid;
    $raw_title = $i->title;
    $raw_url = $i->alias;
    $raw_category = $i->name;

    // json content
    $result_array[] = array($raw_title => array('url' => $raw_url, 'category' => $raw_category));
  }

  drupal_json_output($result_array);
  drupal_exit();
?>

