<?php
require 'wp-load.php';


class Database {


  public function __construct() {
  global $wpdb;

		$this->wpdb = $wpdb;
  }

  // This prints the app URL
  public function get_url() {
  $results = $this->wpdb->get_var( "SELECT * FROM {$this->wpdb->prefix}options WHERE option_name = 'siteurl' ", 2 );
  return $results;

  }

  // This counts the posts
  public function get_post_count() {
  $post_count = $this->wpdb->get_var( "SELECT COUNT(*) FROM {$this->wpdb->prefix}posts" );
  return $post_count;

  }

  public function total_revisions() {
  $revision_count = $this->wpdb->get_var( "SELECT COUNT(*) FROM {$this->wpdb->prefix}posts where post_type = 'revision'" );
  return $revision_count;

  }

  // This prints user reg URl
  public function get_reg_url() {
  $reg_url = $this->wpdb->get_var( "SELECT * FROM {$this->wpdb->prefix}users WHERE ID = 1 ", 4 );
  return $reg_url;
  }
  // This would update the user ID
  public function update_id($num) {
    $this->wpdb->query( $this->wpdb->prepare(
    "
        UPDATE {$this->wpdb->prefix}users
        SET ID = %d
        WHERE ID = $num
    ",
        5, $num
) );
  }
}


$new_connection = new Database();
echo $new_connection->get_url();
echo "<br>";
echo $new_connection->total_revisions();
echo "<br>";
echo $new_connection->get_post_count();
echo "<br>";
echo $new_connection->get_reg_url();
echo "<br>";
echo $new_connection->update_id(1);
?>
