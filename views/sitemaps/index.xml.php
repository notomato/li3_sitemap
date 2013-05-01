<?php foreach($sitemap as $controller => $collections):?>
	<url>
		<loc>http://www.lithium101.com<?=$this->url("{$controller}::index");?></loc>
		<lastmod>2005-01-01</lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.8</priority>
	</url>
	<?php foreach($collections as $collection): 
		foreach($collection as $item): ?>
	<url>
		<loc>http://www.lithium101.com<?=$this->url(array("{$controller}::view", "name"=>$item->name, 'owner' => $item->owner->login),array('absolute'=>true));?></loc>
		<lastmod><?= date('Y-m-d\TH:i:sP', (isset($item->updated) ? $item->updated->sec : $item->created->sec ))?></lastmod>
	</url>
	<?php endforeach; endforeach;?>
<?php endforeach;?>