<?php

function get_site_verify(){

	return;

	$table_name = 'arafat_config';
	$data_key = 'global_seo';
	$res = get_first( get_on_condition( $table_name, "data_key='$data_key'" ) );

	if( $res ){
		$res  = html_decode( $res->data_value );
	}

	return $res;
}

function get_global_seo(){
	return;

	$table_name = 'arafat_config';
	$data_key = 'global_site_verify';

	$res = get_first( get_on_condition( $table_name, "data_key='$data_key'" ) );

	if( $res ){
		$res  = html_decode( $res->data_value );
	}

	return $res;
}

function get_social_link($key){

	return;

	$link = get_first( get_on_condition( 'social_links', "name='$key'" ) );
	if( $link ){
		$link = $link->link;

		return $link;
	}

	return '';

}

function get_advisory_board_seo(){

	return;

	$table_name = 'arafat_config';
	$data_key = 'advisory_board_seo';

	$res = get_first( get_on_condition( $table_name, "data_key='$data_key'" ) );

	if( $res ){
		$res  = html_decode( $res->data_value );
	}

	return $res;
}

function get_current_issue_by_journal_slug( $journal_slug ){

	return;

	$journal =  get_first( get_on_condition('journal_names', "slug='$journal_slug'") );

	$journal_name_id = 0;
	if( $journal ){
		$journal_name_id = $journal->id;
	}

	$last_year  = get_first( db_select_raw( "SELECT DISTINCT article_year FROM new_articles WHERE journal_name_id='$journal_name_id' ORDER BY article_year DESC LIMIT 1"  ) );

	// pr($last_year);
	if( $last_year ){
		$year_name = $last_year->article_year;

		$all_volume_issue  = get_first( db_select_raw( "SELECT DISTINCT article_year, volume, issue FROM new_articles WHERE journal_name_id='$journal_name_id' AND article_year = '$year_name'  ORDER BY volume DESC, issue DESC LIMIT 1"  ) );

		// pr( $all_volume_issue );

		if( $all_volume_issue ){

			$current_issue = $all_volume_issue->article_year.' Vol. '.$all_volume_issue->volume.' Issue '.$all_volume_issue->issue;

			return $current_issue;

		}

	}

	return '';
}

function get_current_issue_by_journal_id( $journal_slug ){

	return;
	
	$journal =  get_first( get_on_condition('journal_names', "slug='$journal_slug'") );

	$journal_name_id = 0;
	if( $journal ){
		$journal_name_id = $journal->id;
	}

	$last_year  = get_first( db_select_raw( "SELECT DISTINCT article_year FROM new_articles WHERE journal_name_id='$journal_name_id' ORDER BY article_year DESC LIMIT 1"  ) );

	// pr($last_year);
	if( $last_year ){
		$year_name = $last_year->article_year;

		$all_volume_issue  = get_first( db_select_raw( "SELECT DISTINCT article_year, volume, issue FROM new_articles WHERE journal_name_id='$journal_name_id' AND article_year = '$year_name'  ORDER BY volume DESC, issue DESC LIMIT 1"  ) );

		// pr( $all_volume_issue );

		if( $all_volume_issue ){

			$year = (int) $all_volume_issue->article_year;
			$vol = (int) $all_volume_issue->volume;
			$issue = (int) $all_volume_issue->issue;

			$current_issue_articles = db_select_raw( "SELECT * FROM new_articles WHERE journal_name_id='$journal_name_id' AND article_year='$year' AND volume='$vol' AND issue='$issue' ORDER BY volume DESC, issue DESC"  );

			return $current_issue_articles;
		}
	}

	return '';

}
