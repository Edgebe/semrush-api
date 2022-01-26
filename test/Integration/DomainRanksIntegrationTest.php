<?php


namespace Silktide\SemRushApi\Test\Integration;

use Silktide\SemRushApi\Data\Column;
use Silktide\SemRushApi\Model\Result;
use Silktide\SemRushApi\Model\Row;
use Silktide\SemRushApi\Test\ResponseExample\ResponseExampleHelper;
use Guzzle\Http\Message\Response;

class DomainRanksIntegrationTest extends AbstractIntegrationTest {

    public function testDomainRanksRequest()
    {
        $this->setupResponse('domain_ranks_silktide');
        $result = $this->client->getDomainRanks('silktide.com');
        $this->verifyResult($result, 26);

        /**
         * @var Row $row
         */
        $row = $result[1];
        self::assertEquals("silktide.com", $row->getValue(Column::COLUMN_OVERVIEW_DOMAIN));
        self::assertEquals(94028, $row->getValue(Column::COLUMN_OVERVIEW_SEMRUSH_RATING));
    }
} 