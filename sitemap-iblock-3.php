<?php
					use Bitrix\Main\Loader;
					require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
					if(!Loader::includeModule("sotbit.regions"))
					{
						return false;
					}
					$domain = new \Sotbit\Regions\Location\Domain();
					$domainCode = $domain->getProp("CODE");
					header('Content-Type: text/xml');
					?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$domainCode?>/blog/kak-vybrat-stal-dlya-nozha-v-tsenovoy-kategorii-do-5-000-rubley/</loc><lastmod>2021-01-26T00:42:03+00:00</lastmod></url><url><loc><?=$domainCode?>/blog/kukhonnye-nozhi-kakim-nozhom-chto-rezat/</loc><lastmod>2021-01-26T16:45:28+00:00</lastmod></url><url><loc><?=$domainCode?>/blog/kukhonnye-nozhi-v-posudomoechnoy-mashine-mozhno-ili-nelzya-rekomendatsii/</loc><lastmod>2021-01-27T00:59:18+00:00</lastmod></url><url><loc><?=$domainCode?>/blog/kak-vybrat-metatelnyy-nozh/</loc><lastmod>2021-01-28T21:05:06+00:00</lastmod></url><url><loc><?=$domainCode?>/blog/proizvodstvo-yaponskikh-nozhey-samura/</loc><lastmod>2021-01-30T14:49:40+00:00</lastmod></url><url><loc><?=$domainCode?>/blog/</loc><lastmod>2021-01-30T14:49:40+00:00</lastmod></url></urlset>