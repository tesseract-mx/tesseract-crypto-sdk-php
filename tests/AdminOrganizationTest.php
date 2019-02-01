<?php namespace Tesseract\Crypto\SDK\Test;

require __DIR__ . '/ResourceTest.php';

use Tesseract\Crypto\SDK\Http\Header;
use Tesseract\Crypto\SDK\Http\StatusCode;
use Tesseract\Crypto\SDK\Representations\Enums\LicenseStatus;
use Tesseract\Crypto\SDK\Representations\HATEOAS\Paged;
use function Tesseract\Crypto\SDK\to_array;

/**
 * Class AdminOrganizationTest
 * @package Tesseract\Crypto\SDK\Test
 */
class AdminOrganizationTest extends ResourceTest
{
    /**
     * @return array
     * @throws \Exception
     */
    public function testRawAdminInstitutions() : array
    {
        $response = $this->sdk->adminInstitutions();
        $this->assertEquals(StatusCode::OK,$response->getStatusCode());
        $body = to_array($response->getBody());
        $this->assertArrayHasKey(Paged::_CONTENT, $body);
        return $body[Paged::_CONTENT];
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function testRawAdminInstitution()
    {
        $response = $this->sdk->adminInstitution(self::INSTITUTION_ID);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }

    /**
     * @return array
     */
    public function dataInstitutions() : array
    {
        return include('institutions.php');
    }

    /**
     *
     * @dataProvider dataInstitutions
     * @param array $institution
     * @return array
     * @throws \Exception
     */
    public function testRawAdminCreateInstitution(array $institution)
    {
        $response = $this->sdk->adminCreateInstitution($institution);
        $this->assertEquals(StatusCode::CREATED, $response->getStatusCode());
        $this->assertTrue($response->hasHeader(Header::LOCATION));

        $location = $response->getHeaderLine(Header::LOCATION);

        $response = $this->sdk->get($location);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());

        $institution = to_array($response->getBody());

        $emailParts = explode('@',$institution['email']);
        $institution['email'] = ($emailParts[1] == 'hotmail.com' ? 'alexti_07' : 'alexisanchesb') . '@' . $emailParts[1];

        $response = $this->sdk->adminPutInstitution($institution['id'], $institution);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());

        $institution = to_array($response->getBody());

        $response = $this->sdk->adminDeleteInstitution($institution['id']);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());

        return $institution;
    }

    /**
     * @depends testRawAdminInstitution
     * @param array $institution
     * @return string
     * @throws \Exception
     */
    public function testRawAdminCreateLicense(array $institution)
    {
        $license = [
            'stock' => 100,
            'duration' => 1
        ];

        $response = $this->sdk->adminCreateLicense($institution['id'], $license);
        $this->assertEquals(StatusCode::CREATED, $response->getStatusCode());

        $this->assertTrue($response->hasHeader(Header::LOCATION));
        return $response->getHeaderLine(Header::LOCATION);
    }

    /**
     * @depends testRawAdminCreateLicense
     * @param string $location
     * @return array
     * @throws \Exception
     */
    public function testRawAdminLicenseByLocation(string $location)
    {
        $response = $this->sdk->get($location);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }

    /**
     * @depends testRawAdminInstitution
     * @depends testRawAdminLicenseByLocation
     * @param array $institution
     * @param array $license
     * @return array
     * @throws \Exception
     */
    public function testRawAdminPutLicense(array $institution, array $license)
    {
        $license['status'] = LicenseStatus::ACTIVATED;
        $response = $this->sdk->adminPutLicense($institution['id'], $license['id'], $license);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }
}