<?php
/**
 * formate the author name and the date of create/update/delete
 *
 * @param Doctrine_Record $record informations
 * @param bool $delete show deleted_at ?
 * @param bool $update show updated_at ?
 */
function formate_author_and_date($record, $deleted = true, $updated = true)
{
	$create_date = format_date($record->getCreatedAt());
	printf(__('Created by <b>%s</b> on %s.'), $record->getAuthor()->getPseudo(), $create_date);
	echo '&nbsp;';
	if ($updated && $record->getUpdatedAt() && $create_date !== $update_date = format_date($record->getUpdatedAt()))
	{
		printf(__('Last edition on %s.'), $update_date);
		echo '&nbsp;';
	}
	if ($deleted && $record->getDeletedAt())
	{
		printf(__('Deleted on %s.'), format_date($record->getDeletedAt()));
	}
}

/**
 * format pagination links
 *
 * @param sfDoctrinePager $record The pager instance
 * @param string $uri the uri which will contain the pager
 * @param string $param the param name for page
 */
function paginate($pager, $uri = null, $param = 'page')
{
	$navigation = '';
 
	if ($pager->haveToPaginate())
	{
		if ('@' === $uri[0])
		{
			$uri = url_for($uri);
		}
		$uri .= (strpos('?', $uri) ? '&' : '?').$param.'=';
 
		// First and previous page
		if ($pager->getPage() != 1)
		{
			$navigation .= link_to(image_tag('/sf/sf_admin/images/first.png', 'align=absmiddle'), $uri.'1');
			if ($pager->getPage() != 2)
			{ //if it's the second page, this link is useless ..
				$navigation .= link_to(image_tag('/sf/sf_admin/images/previous.png', 'align=absmiddle'), $uri.$pager->getPreviousPage());
			}
			$navigation .= ' ';
		}
 
		// Pages one by one
		$links = array();
		foreach ($pager->getLinks() as $page)
		{
			$links[] = link_to_unless($page == $pager->getPage(), $page, $uri.$page);
		}
		$navigation .= join('	', $links);
 
		// Next and last page
		if ($pager->getPage() != $pager->getLastPage())
		{
			if ($pager->getLastPage() != $pager->getNextPage())
			{ //the "last" & "next" page are the same
				$navigation .= ' '.link_to(image_tag('/sf/sf_admin/images/next.png', 'align=absmiddle'), $uri.$pager->getNextPage());
			}
			$navigation .= link_to(image_tag('/sf/sf_admin/images/last.png', 'align=absmiddle'), $uri.$pager->getLastPage());
		}
	}
 
	return $navigation;
}

/**
 * create title from content
 *
 * @param string $content the contact where we have to search the title
 * @param string $sep the separator if a title is found
 * @param string $title_start the start part of the title
 * @param string $title_end the end part of the title
 */
function titleize($content, $sep = ' &bull; ', $title_start = '<div class="title">', $title_end = '</div>')
{
	if (false !== $title_pos = strpos($content, $title_start))
	{ //Dynamic title finder
		$title = substr($content, $title_pos + strlen($title_start)); //remove $title_start
		if (false === strpos($title, $title_start))
		{ //only ONE title 
			$title = trim(substr($title, 0, strpos($title, $title_end))); //remove $title_end & trim

			if (!empty($title) && false === strpos($title, '<'))
			{ //not empty & no tag
				return $title . $sep;
			}
		}
	}

	return '';
}
