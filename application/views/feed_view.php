<?php
echo '<?xml version="1.0" encoding="' . $encoding . '" ?>' . "\n";
?>
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
	
<title><?php echo $feed_name; ?></title>
<link>
	<?php echo $feed_url; ?>
</link>

<description><?php echo $page_description; ?></description>
<dc:language><?php echo $page_language; ?></dc:language>
<dc:creator><?php echo $creator_email; ?></dc:creator>
<dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>
<admin:generatorAgent rdf:resource="http://www.codeigniter.com/" />

<?php foreach($data as $row): ?>
	<item>
		<title><?= xml_convert($row['title']) ?></title>
		<link><?= base_url().'article/view/'.$row['id'] ?></link>
		<guid><?= base_url().'article/view/'.$row['id'] ?></guid>
		<description><![CDATA[ <?php echo substr(strip_tags($row['newstext']),0,30); ?> ]]></description>

		<pubDate><?= $row['datetime'] ?></pubDate>
	</item>
<?php endforeach; ?>

</channel>
</rss>