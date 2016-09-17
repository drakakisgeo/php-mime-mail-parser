<?php
namespace PhpMimeMailParser;

use PhpMimeMailParser\Parser;
use PhpMimeMailParser\Attachment;
use PhpMimeMailParser\Exception;

/**
 * Test Parser of php-mime-mail-parser
 *
 * Fully Tested Mailparse Extension Wrapper for PHP 5.4+
 *
 */
class ParserTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatingMoreThanOneInstanceOfParser()
    {
        $file = __DIR__.'/mails/issue84';
        (new Parser())->setPath($file)->getMessageBody();
        (new Parser())->setPath($file)->getMessageBody();
    }
    
    public function provideData()
    {

        $data = array(
            /*
            array(
                // Mail ID
                'm0001',
                // Subject Expected
                'Mail avec fichier attaché de 1ko',
                // From Expected (array)
                array(array('display' => 'Name','address' => 'name@company.com','is_group' => false)),
                // From Expected
                'Name <name@company.com>',
                // To Expected (array)
                array(array('display' => 'Name','address' => 'name@company.com','is_group' => false)),
                // To Expected
                'name@company2.com',
                // Text Expected (MATCH = exact match, COUNT = Count the number of substring occurrences )
                array('MATCH',"\n"),
                // Html Expected (MATCH = exact match, COUNT = Count the number of substring occurrences )
                array('COUNT',1,'<div dir="ltr"><br></div>'),
                // Array of attachments (FileName, File Size, String inside the file,
                //      Count of this string, ContentType, MD5 of Serialize Headers, String inside the HTML Embedded)
                array(array('attach01',2,'a',1,'image/gif','attachment', '4c1d5793', 'b3309f')),
                // Count of Embedded Attachments
                0)
            */
                array(
                    'm0001',
                    'Mail avec fichier attaché de 1ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach01',
                            2,
                            'a',
                            1,
                            'application/octet-stream',
                            'attachment',
                            '04c1d5793efa97c956d011a8b3309f05',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0002',
                    'Mail avec fichier attaché de 3ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach02',
                            2229,
                            'Lorem ipsum',
                            8,
                            'application/octet-stream',
                            'attachment',
                            '18f541cc6bf49209d2bf327ecb887355',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0003',
                    'Mail de 14 Ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach03',
                            13369,
                            'dolor sit amet',
                            48,
                            'application/octet-stream',
                            'attachment',
                            '8734417734fabfa783df6fed0ccf7a4a',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0004',
                    'Mail de 800ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach04',
                            817938,
                            'Phasellus scelerisque',
                            242,
                            'application/octet-stream',
                            'attachment',
                            'c0b5348ef825bf62ba2d07d70d4b9560',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0005',
                    'Mail de 1500 Ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach05',
                            1635877,
                            'Aenean ultrices',
                            484,
                            'application/octet-stream',
                            'attachment',
                            '1ced323befc39ebbc147e7588d11ab08',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0006',
                    'Mail de 3 196 Ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach06',
                            3271754,
                            'lectus ac leo ullamcorper',
                            968,
                            'application/octet-stream',
                            'attachment',
                            '5dc6470ab63e86e8f68d88afb11556fe',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0007',
                    'Mail avec fichier attaché de 3ko',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'attach02',
                            2229,
                            'facilisis',
                            4,
                            'application/octet-stream',
                            'attachment',
                            '0e6d510323b009da939070faf72e521c',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0008',
                    'Testing MIME E-mail composing with cid',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company2.com>',
                    array('COUNT',1,'Please use an HTML capable mail program to read'),
                    array('COUNT',1,'<center><h1>Testing MIME E-mail composing with cid</h1></center>'),
                    array(
                        array(
                            'logo.jpg',
                            2695,
                            '',
                            0,
                            'image/gif',
                            'inline',
                            '102aa12e16635bf2b0b39ef6a91aa95c',
                            '',
                            ),
                        array(
                            'background.jpg',
                            18255,
                            '',
                            0,
                            'image/gif',
                            'inline',
                            '798f976a5834019d3f2dd087be5d5796',
                            '',
                            ),
                        array(
                            'attachment.txt',
                            2229,
                            'Sed pulvinar',
                            4,
                            'text/plain',
                            'attachment',
                            '71fff85a7960460bdd3c4b8f1ee9279b',
                            '',
                            )
                        ),
                    2),
                array(
                    'm0009',
                    'Ogone NIEUWE order Maurits PAYID: 951597484 / orderID: 456123 / status: 5',
                    array(
                        array(
                            'display' => 'Ogone',
                            'address' => 'noreply@ogone.com',
                            'is_group' => false
                            )
                    ),
                    '"Ogone" <noreply@ogone.com>',
                    array(
                        array(
                            'display' => 'info@testsite.com',
                            'address' => 'info@testsite.com',
                            'is_group' => false
                            )
                    ),
                    'info@testsite.com',
                    array('COUNT',1,'951597484'),
                    array('MATCH',''),
                    array(),
                    0),
                array(
                    'm0010',
                    'Mail de 800ko without filename',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    'name@company2.com',
                    array('MATCH',"\n"),
                    array('COUNT',1,'<div dir="ltr"><br></div>'),
                    array(
                        array(
                            'noname1',
                            817938,
                            'Suspendisse',
                            726,
                            'application/octet-stream',
                            'attachment',
                            '8da4b0177297b1d7f061e44d64cc766f',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0011',
                    'Hello World !',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array('COUNT',1,'This is a text body'),
                    array('MATCH',''),
                    array(
                        array(
                            'file.txt',
                            29,
                            'This is a file',
                            1,
                            'text/plain',
                            'attachment',
                            '839d0486dd1b91e520d456bb17c33148',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0012',
                    'Hello World !',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    'Name <name@company.com>',
                    array('COUNT',1,'This is a text body'),
                    array('MATCH',''),
                    array(
                        array(
                            'file.txt',
                            29,
                            'This is a file',
                            1,
                            'text/plain',
                            'attachment',
                            '839d0486dd1b91e520d456bb17c33148',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0013',
                    '50032266 CAR 11_MNPA00A01_9PTX_H00 ATT N° 1467829. pdf',
                    array(
                        array(
                            'display' => 'NAME Firstname',
                            'address' => 'firstname.name@groupe-company.com',
                            'is_group' => false
                            )
                    ),
                    'NAME Firstname <firstname.name@groupe-company.com>',
                    array(
                        array(
                            'display' => 'paul.dupont@company.com',
                            'address' => 'paul.dupont@company.com',
                            'is_group' => false
                            )
                    ),
                    '"paul.dupont@company.com" <paul.dupont@company.com>',
                    array('COUNT',1,'Superviseur de voitures'),
                    array('MATCH',''),
                    array(
                        array(
                            '50032266 CAR 11_MNPA00A01_9PTX_H00 ATT N° 1467829.pdf',
                            10,
                            '',
                            0,
                            'application/pdf',
                            'attachment',
                            'ffe2cb0f5df4e2cfffd3931b6566f3cb',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0014',
                    'Test message from Netscape Communicator 4.7',
                    array(
                        array(
                            'display' => 'Doug Sauder',
                            'address' => 'dwsauder@example.com',
                            'is_group' => false
                            )
                    ),
                    'Doug Sauder <dwsauder@example.com>',
                    array(
                        array(
                            'display' => 'Joe Blow',
                            'address' => 'blow@example.com',
                            'is_group' => false
                            )
                    ),
                    'Joe Blow <blow@example.com>',
                    array('COUNT',1,'Die Hasen und die'),
                    array('MATCH',''),
                    array(
                        array(
                            'HasenundFrösche.txt',
                            747,
                            'noch',
                            2,
                            'text/plain',
                            'inline',
                            '865238356eec20b67ce8c33c68d8a95a',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0015',
                    'Up to $30 Off Multivitamins!',
                    array(
                        array(
                            'display' => 'Vitamart.ca',
                            'address' => 'service@vitamart.ca',
                            'is_group' => false
                            )
                    ),
                    '"Vitamart.ca" <service@vitamart.ca>',
                    array(
                        array(
                            'display' => 'me@somewhere.com',
                            'address' => 'me@somewhere.com',
                            'is_group' => false
                            )
                    ),
                    'me@somewhere.com',
                    array('COUNT',1,'Hi,'),
                    array('COUNT',1,'<strong>*How The Sale Works</strong>'),
                    array(
                        array(
                            'noname1',
                            2616,
                            '$150+ of Multivitamins',
                            1,
                            'text/plain',
                            'inline',
                            '87caaaf9bf1d7ebc2769254710c38a0d',
                            '',
                            ),
                        array(
                            'noname2',
                            17341,
                            'div',
                            82,
                            'text/html',
                            'inline',
                            'b70ff760112a71009d8295c34fd67d9b',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0016',
                    'Test message with multiple From headers',
                    array(
                        array(
                            'display' => 'Doug Sauder',
                            'address' => 'dwsauder@example.com',
                            'is_group' => false
                            )
                    ),
                    'Doug Sauder <dwsauder@example.com>',
                    array(
                        array(
                            'display' => 'Joe Blow',
                            'address' => 'blow@example.com',
                            'is_group' => false
                            )
                    ),
                    'Joe Blow <blow@example.com>',
                    array('COUNT',1,'Die Hasen und die'),
                    array('MATCH',''),
                    array(
                        array(
                            'HasenundFrösche.txt',
                            747,
                            'noch',
                            2,
                            'text/plain',
                            'inline',
                            '865238356eec20b67ce8c33c68d8a95a',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0018',
                    '[Korea] Name',
                    array(
                        array(
                            'display' => 'name@company.com',
                            'address' => 'name@company.com',
                            'is_group' => false
                            )
                    ),
                    '<name@company.com>',
                    array(
                        array(
                            'display' => 'name@company2.com',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            )
                    ),
                    '"name@company2.com" <name@company2.com>',
                    array('COUNT',1,'My traveling companions!'),
                    array('MATCH',''),
                    array(
                        array(
                            '사진.JPG',
                            174,
                            '',
                            0,
                            'image/jpeg',
                            'attachment',
                            '567f29989506f21cea8ac992d81ce4c1',
                            '',
                            ),
                        array(
                            'ATT00001.txt',
                            25,
                            'iPhone',
                            1,
                            'text/plain',
                            'attachment',
                            '095f96b9d5a25d051ad425356745334f',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0019',
                    'Re: Maya Ethnobotanicals - Emails',
                    array(
                        array(
                            'display' => 'sendeär',
                            'address' => 'sender@test.com',
                            'is_group' => false
                            )
                    ),
                    'sendeär <sender@test.com>',
                    array(
                        array(
                            'display' => 'test',
                            'address' => 'test@asdasd.com',
                            'is_group' => false
                            )
                    ),
                    '"test" <test@asdasd.com>',
                    array('COUNT',1,'captured'),
                    array('MATCH',''),
                    array(),
                    0),
                array(
                    'm0020',
                    '1',
                    array(
                        array(
                            'display' => 'Finntack Newsletter',
                            'address' => 'newsletter@finntack.com',
                            'is_group' => false
                            )
                    ),
                    'Finntack Newsletter <newsletter@finntack.com>',
                    array(
                        array(
                            'display' => 'Clement Wong',
                            'address' => 'clement.wong@finntack.com',
                            'is_group' => false
                            )
                    ),
                    'Clement Wong <clement.wong@finntack.com>',
                    array('MATCH',"1\r\n\r\n"),
                    array('COUNT',1,'<html>'),
                    array(
                        array(
                            'noname1',
                            1432,
                            '',
                            0,
                            'text/calendar',
                            'attachment',
                            'bf7bfb9b8dd11ff0c830b2388560d434',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0021',
                    'occurs when divided into an array, and the last e of the array! Пут ін хуйло!!!!!!',
                    array(
                        array(
                            'display' => 'mail@exemple.com',
                            'address' => 'mail@exemple.com',
                            'is_group' => false
                            )
                    ),
                    'mail@exemple.com',
                    array(
                        array(
                            'display' => 'mail@exemple.com',
                            'address' => 'mail@exemple.com',
                            'is_group' => false
                            ),
                        array(
                            'display' => 'mail2@exemple3.com',
                            'address' => 'mail2@exemple3.com',
                            'is_group' => false
                            ),
                        array(
                            'display' => 'mail3@exemple2.com',
                            'address' => 'mail3@exemple2.com',
                            'is_group' => false
                            ),
                    ),
                    'mail@exemple.com, mail2@exemple3.com, mail3@exemple2.com',
                    array('COUNT',1,'mini plain body'),
                    array('MATCH',''),
                    array(),
                    0),
                array(
                    'm0022',
                    '[PRJ-OTH] asdf  árvíztűrő tükörfúrógép',
                    array(
                        array(
                            'display' => 'sendeär',
                            'address' => 'sender@test.com',
                            'is_group' => false
                            ),
                    ),
                    'sendeär <sender@test.com>',
                    array(
                        array(
                            'display' => 'test',
                            'address' => 'test@asdasd.com',
                            'is_group' => false
                            ),
                    ),
                    '"test" <test@asdasd.com>',
                    array('COUNT',1,'captured'),
                    array('MATCH',''),
                    array(),
                    0),
                array(
                    'm0023',
                    'If you can read this you understand the example.',
                    array(
                        array(
                            'display' => 'Keith Moore',
                            'address' => 'moore@cs.utk.edu',
                            'is_group' => false
                            ),
                    ),
                    'Keith Moore <moore@cs.utk.edu>',
                    array(
                        array(
                            'display' => 'Keld Jørn Simonsen',
                            'address' => 'keld@dkuug.dk',
                            'is_group' => false
                            ),
                    ),
                    'Keld Jørn Simonsen <keld@dkuug.dk>',
                //CC = André Pirard <PIRARD@vm1.ulg.ac.be>
                    array('COUNT',1,'captured'),
                    array('MATCH',''),
                    array(),
                    0),
                array(
                    'm0024',
                    'Persil, abeilles ...',
                    array(
                        array(
                            'display' => 'John DOE',
                            'address' => 'blablafakeemail@provider.fr',
                            'is_group' => false
                            ),
                    ),
                    'John DOE <blablafakeemail@provider.fr>',
                    array(
                        array(
                            'display' => 'list-name',
                            'address' => 'list-name@list-domain.org',
                            'is_group' => false
                            ),
                    ),
                    'list-name <list-name@list-domain.org>',
                    array('MATCH',''),
                    array('MATCH',''),
                    array(
                        array(
                            'Biodiversité de semaine en semaine.doc',
                            27648,
                            '',
                            0,
                            'application/msword',
                            'attachment',
                            '57e8a3cf9cc29d5cde7599299a853560',
                            '',
                            )
                        ),
                    0),
                array(
                    'm0025',
                    'Testing MIME E-mail composing with cid',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company.com',
                            'is_group' => false
                            ),
                    ),
                    'Name <name@company.com>',
                    array(
                        array(
                            'display' => 'Name',
                            'address' => 'name@company2.com',
                            'is_group' => false
                            ),
                    ),
                    'Name <name@company2.com>',
                    array('COUNT',1,'Please use an HTML capable mail program to read'),
                    array('COUNT',1,'<center><h1>Testing MIME E-mail composing with cid</h1></center>'),
                    array(
                        array(
                            'logo.jpg',
                            2695,
                            '',
                            0,
                            'image/gif',
                            'inline',
                            '0f65fd0831e68da313a2dcc58286d009',
                            'IZqShSiOcB213NOfRLezbJyBjy08zKMaNHpGo9nxc49ywafxGZ',
                            ),
                        array(
                            'background.jpg',
                            18255,
                            '',
                            0,
                            'image/gif',
                            'inline',
                            '840bdde001a8c8f6fb49ee641a89cdd8',
                            'QISn7+8fXB0RCQB2cyf8AcIQq2SMSQnzL',
                            ),
                        array(
                            'attachment.txt',
                            2229,
                            'Sed pulvinar',
                            4,
                            'text/plain',
                            'attachment',
                            '71fff85a7960460bdd3c4b8f1ee9279b',
                            '',
                            )
                        ),
                    2),
                );
        return $data;
    }

    /**
     * @dataProvider provideData
     */
    public function testFromPath(
        $mid,
        $subjectExpected,
        $fromAddressesExpected,
        $fromExpected,
        $toAddressesExpected,
        $toExpected,
        $textExpected,
        $htmlExpected,
        $attachmentsExpected,
        $countEmbeddedExpected
    ) {
        //Init
        $file = __DIR__.'/mails/'.$mid;
        $attach_dir = __DIR__.'/mails/attach_'.$mid.'/';

        //Load From Path
        $Parser = new Parser();
        $Parser->setPath($file);

        //Test Header : subject
        $this->assertEquals($subjectExpected, $Parser->getHeader('subject'));
        $this->assertArrayHasKey('subject', $Parser->getHeaders());

        //Test Header : from
        $this->assertEquals($fromAddressesExpected, $Parser->getAddresses('from'));
        $this->assertEquals($fromExpected, $Parser->getHeader('from'));
        $this->assertArrayHasKey('from', $Parser->getHeaders());

        //Test Header : to
        $this->assertEquals($toAddressesExpected, $Parser->getAddresses('to'));
        $this->assertEquals($toExpected, $Parser->getHeader('to'));
        $this->assertArrayHasKey('to', $Parser->getHeaders());

        //Test Invalid Header
        $this->assertFalse($Parser->getHeader('azerty'));
        $this->assertArrayNotHasKey('azerty', $Parser->getHeaders());

        //Test Raw Headers
        $this->assertInternalType('string', $Parser->getHeadersRaw());

        //Test  Body : text
        if ($textExpected[0] == 'COUNT') {
            $this->assertEquals($textExpected[1], substr_count($Parser->getMessageBody('text'), $textExpected[2]));
        } elseif ($textExpected[0] == 'MATCH') {
            $this->assertEquals($textExpected[1], $Parser->getMessageBody('text'));
        }

        //Test Body : html
        if ($htmlExpected[0] == 'COUNT') {
            $this->assertEquals($htmlExpected[1], substr_count($Parser->getMessageBody('html'), $htmlExpected[2]));
        } elseif ($htmlExpected[0] == 'MATCH') {
            $this->assertEquals($htmlExpected[1], $Parser->getMessageBody('html'));
        }

        //Test Nb Attachments
        $attachments = $Parser->getAttachments();
        $this->assertEquals(count($attachmentsExpected), count($attachments));
        $iterAttachments = 0;

        //Test Attachments
        $attachmentsEmbeddedToCheck = array();
        if (count($attachmentsExpected) > 0) {
            //Save attachments
            $Parser->saveAttachments($attach_dir);

            foreach ($attachmentsExpected as $attachmentExpected) {
                //Test Exist Attachment
                $this->assertTrue(file_exists($attach_dir.$attachmentExpected[0]));

                //Test Filename Attachment
                $this->assertEquals($attachmentExpected[0], $attachments[$iterAttachments]->getFilename());

                //Test Size Attachment
                $this->assertEquals(
                    $attachmentExpected[1],
                    filesize($attach_dir.$attachments[$iterAttachments]->getFilename())
                );

                //Test Inside Attachment
                if ($attachmentExpected[2] != '' && $attachmentExpected[3] >0) {
                    $fileContent = file_get_contents(
                        $attach_dir.$attachments[$iterAttachments]->getFilename(),
                        FILE_USE_INCLUDE_PATH
                    );
                    $this->assertEquals($attachmentExpected[3], substr_count($fileContent, $attachmentExpected[2]));
                    $this->assertEquals(
                        $attachmentExpected[3],
                        substr_count($attachments[$iterAttachments]->getContent(), $attachmentExpected[2])
                    );
                }

                //Test ContentType Attachment
                $this->assertEquals($attachmentExpected[4], $attachments[$iterAttachments]->getContentType());

                //Test ContentDisposition Attachment
                $this->assertEquals($attachmentExpected[5], $attachments[$iterAttachments]->getContentDisposition());

                //Test md5 of Headers Attachment
                $this->assertEquals(
                    $attachmentExpected[6],
                    md5(serialize($attachments[$iterAttachments]->getHeaders()))
                );

                //Save embedded Attachments to check
                if ($attachmentExpected[7] != '') {
                    array_push($attachmentsEmbeddedToCheck, $attachmentExpected[7]);
                }

                //Remove Attachment
                unlink($attach_dir.$attachments[$iterAttachments]->getFilename());

                $iterAttachments++;
            }
            //Remove Attachment Directory
            rmdir($attach_dir);
        } else {
            $this->assertFalse($Parser->saveAttachments($attach_dir));
        }

        //Test embedded Attachments
        $htmlEmbedded = $Parser->getMessageBody('htmlEmbedded');
        $this->assertEquals($countEmbeddedExpected, substr_count($htmlEmbedded, "data:"));

        if (!empty($attachmentsEmbeddedToCheck)) {
            foreach ($attachmentsEmbeddedToCheck as $itemExpected) {
                $this->assertEquals(1, substr_count($htmlEmbedded, $itemExpected));
            }
        }
    }

    /**
     * @dataProvider provideData
     */
    public function testFromText(
        $mid,
        $subjectExpected,
        $fromAddressesExpected,
        $fromExpected,
        $toAddressesExpected,
        $toExpected,
        $textExpected,
        $htmlExpected,
        $attachmentsExpected,
        $countEmbeddedExpected
    ) {
        //Init
        $file = __DIR__.'/mails/'.$mid;
        $attach_dir = __DIR__.'/mails/attach_'.$mid.'/';

        //Load From Text
        $Parser = new Parser();
        $Parser->setText(file_get_contents($file));

        //Test Header : subject
        $this->assertEquals($subjectExpected, $Parser->getHeader('subject'));
        $this->assertArrayHasKey('subject', $Parser->getHeaders());

        //Test Header : from
        $this->assertEquals($fromAddressesExpected, $Parser->getAddresses('from'));
        $this->assertEquals($fromExpected, $Parser->getHeader('from'));
        $this->assertArrayHasKey('from', $Parser->getHeaders());

        //Test Header : to
        $this->assertEquals($toAddressesExpected, $Parser->getAddresses('to'));
        $this->assertEquals($toExpected, $Parser->getHeader('to'));
        $this->assertArrayHasKey('to', $Parser->getHeaders());

        //Test Invalid Header
        $this->assertFalse($Parser->getHeader('azerty'));
        $this->assertArrayNotHasKey('azerty', $Parser->getHeaders());

        //Test Raw Headers
        $this->assertInternalType('string', $Parser->getHeadersRaw());

        //Test  Body : text
        if ($textExpected[0] == 'COUNT') {
            $this->assertEquals($textExpected[1], substr_count($Parser->getMessageBody('text'), $textExpected[2]));
        } elseif ($textExpected[0] == 'MATCH') {
            $this->assertEquals($textExpected[1], $Parser->getMessageBody('text'));
        }

        //Test Body : html
        if ($htmlExpected[0] == 'COUNT') {
            $this->assertEquals($htmlExpected[1], substr_count($Parser->getMessageBody('html'), $htmlExpected[2]));
        } elseif ($htmlExpected[0] == 'MATCH') {
            $this->assertEquals($htmlExpected[1], $Parser->getMessageBody('html'));
        }

        //Test Nb Attachments
        $attachments = $Parser->getAttachments();
        $this->assertEquals(count($attachmentsExpected), count($attachments));
        $iterAttachments = 0;

        //Test Attachments
        $attachmentsEmbeddedToCheck = array();
        if (count($attachmentsExpected) > 0) {
            //Save attachments
            $Parser->saveAttachments($attach_dir);

            foreach ($attachmentsExpected as $attachmentExpected) {
                //Test Exist Attachment
                $this->assertTrue(file_exists($attach_dir.$attachmentExpected[0]));

                //Test Filename Attachment
                $this->assertEquals($attachmentExpected[0], $attachments[$iterAttachments]->getFilename());

                //Test Size Attachment
                $this->assertEquals(
                    $attachmentExpected[1],
                    filesize($attach_dir.$attachments[$iterAttachments]->getFilename())
                );

                //Test Inside Attachment
                if ($attachmentExpected[2] != '' && $attachmentExpected[3] >0) {
                    $fileContent = file_get_contents(
                        $attach_dir.$attachments[$iterAttachments]->getFilename(),
                        FILE_USE_INCLUDE_PATH
                    );
                    $this->assertEquals($attachmentExpected[3], substr_count($fileContent, $attachmentExpected[2]));
                    $this->assertEquals(
                        $attachmentExpected[3],
                        substr_count($attachments[$iterAttachments]->getContent(), $attachmentExpected[2])
                    );
                }

                //Test ContentType Attachment
                $this->assertEquals($attachmentExpected[4], $attachments[$iterAttachments]->getContentType());

                //Test ContentDisposition Attachment
                $this->assertEquals($attachmentExpected[5], $attachments[$iterAttachments]->getContentDisposition());

                //Test md5 of Headers Attachment
                $this->assertEquals(
                    $attachmentExpected[6],
                    md5(serialize($attachments[$iterAttachments]->getHeaders()))
                );

                //Save embedded Attachments to check
                if ($attachmentExpected[7] != '') {
                    array_push($attachmentsEmbeddedToCheck, $attachmentExpected[7]);
                }

                //Remove Attachment
                unlink($attach_dir.$attachments[$iterAttachments]->getFilename());

                $iterAttachments++;
            }
            //Remove Attachment Directory
            rmdir($attach_dir);
        } else {
            $this->assertFalse($Parser->saveAttachments($attach_dir));
        }

        //Test embedded Attachments
        $htmlEmbedded = $Parser->getMessageBody('htmlEmbedded');
        $this->assertEquals($countEmbeddedExpected, substr_count($htmlEmbedded, "data:"));

        if (!empty($attachmentsEmbeddedToCheck)) {
            foreach ($attachmentsEmbeddedToCheck as $itemExpected) {
                $this->assertEquals(1, substr_count($htmlEmbedded, $itemExpected));
            }
        }
    }


    /**
     * @dataProvider provideData
     */
    public function testFromStream(
        $mid,
        $subjectExpected,
        $fromAddressesExpected,
        $fromExpected,
        $toAddressesExpected,
        $toExpected,
        $textExpected,
        $htmlExpected,
        $attachmentsExpected,
        $countEmbeddedExpected
    ) {
        //Init
        $file = __DIR__.'/mails/'.$mid;
        $attach_dir = __DIR__.'/mails/attach_'.$mid.'/';

        //Load From Path
        $Parser = new Parser();
        $Parser->setStream(fopen($file, 'r'));

        //Test Header : subject
        $this->assertEquals($subjectExpected, $Parser->getHeader('subject'));
        $this->assertArrayHasKey('subject', $Parser->getHeaders());

        //Test Header : from
        $this->assertEquals($fromAddressesExpected, $Parser->getAddresses('from'));
        $this->assertEquals($fromExpected, $Parser->getHeader('from'));
        $this->assertArrayHasKey('from', $Parser->getHeaders());

        //Test Header : to
        $this->assertEquals($toAddressesExpected, $Parser->getAddresses('to'));
        $this->assertEquals($toExpected, $Parser->getHeader('to'));
        $this->assertArrayHasKey('to', $Parser->getHeaders());

        //Test Invalid Header
        $this->assertFalse($Parser->getHeader('azerty'));
        $this->assertArrayNotHasKey('azerty', $Parser->getHeaders());

        //Test Raw Headers
        $this->assertInternalType('string', $Parser->getHeadersRaw());

        //Test  Body : text
        if ($textExpected[0] == 'COUNT') {
            $this->assertEquals($textExpected[1], substr_count($Parser->getMessageBody('text'), $textExpected[2]));
        } elseif ($textExpected[0] == 'MATCH') {
            $this->assertEquals($textExpected[1], $Parser->getMessageBody('text'));
        }

        //Test Body : html
        if ($htmlExpected[0] == 'COUNT') {
            $this->assertEquals($htmlExpected[1], substr_count($Parser->getMessageBody('html'), $htmlExpected[2]));
        } elseif ($htmlExpected[0] == 'MATCH') {
            $this->assertEquals($htmlExpected[1], $Parser->getMessageBody('html'));
        }

        //Test Nb Attachments
        $attachments = $Parser->getAttachments();
        $this->assertEquals(count($attachmentsExpected), count($attachments));
        $iterAttachments = 0;

        //Test Attachments
        $attachmentsEmbeddedToCheck = array();
        if (count($attachmentsExpected) > 0) {
            //Save attachments
            $Parser->saveAttachments($attach_dir);

            foreach ($attachmentsExpected as $attachmentExpected) {
                //Test Exist Attachment
                $this->assertTrue(file_exists($attach_dir.$attachmentExpected[0]));

                //Test Filename Attachment
                $this->assertEquals($attachmentExpected[0], $attachments[$iterAttachments]->getFilename());

                //Test Size Attachment
                $this->assertEquals(
                    $attachmentExpected[1],
                    filesize($attach_dir.$attachments[$iterAttachments]->getFilename())
                );

                //Test Inside Attachment
                if ($attachmentExpected[2] != '' && $attachmentExpected[3] >0) {
                    $fileContent = file_get_contents(
                        $attach_dir.$attachments[$iterAttachments]->getFilename(),
                        FILE_USE_INCLUDE_PATH
                    );
                    $this->assertEquals($attachmentExpected[3], substr_count($fileContent, $attachmentExpected[2]));
                    $this->assertEquals(
                        $attachmentExpected[3],
                        substr_count($attachments[$iterAttachments]->getContent(), $attachmentExpected[2])
                    );
                }

                //Test ContentType Attachment
                $this->assertEquals($attachmentExpected[4], $attachments[$iterAttachments]->getContentType());

                //Test ContentDisposition Attachment
                $this->assertEquals($attachmentExpected[5], $attachments[$iterAttachments]->getContentDisposition());

                //Test md5 of Headers Attachment
                $this->assertEquals(
                    $attachmentExpected[6],
                    md5(serialize($attachments[$iterAttachments]->getHeaders()))
                );

                //Save embedded Attachments to check
                if ($attachmentExpected[7] != '') {
                    array_push($attachmentsEmbeddedToCheck, $attachmentExpected[7]);
                }

                //Remove Attachment
                unlink($attach_dir.$attachments[$iterAttachments]->getFilename());

                $iterAttachments++;
            }
            //Remove Attachment Directory
            rmdir($attach_dir);
        } else {
            $this->assertFalse($Parser->saveAttachments($attach_dir));
        }

        //Test embedded Attachments
        $htmlEmbedded = $Parser->getMessageBody('htmlEmbedded');
        $this->assertEquals($countEmbeddedExpected, substr_count($htmlEmbedded, "data:"));

        if (!empty($attachmentsEmbeddedToCheck)) {
            foreach ($attachmentsEmbeddedToCheck as $itemExpected) {
                $this->assertEquals(1, substr_count($htmlEmbedded, $itemExpected));
            }
        }
    }

    public function testHeaderRetrievalIsCaseInsensitive()
    {
        //Init
        $file = __DIR__.'/mails/m0001';

        //Load From Path
        $Parser = new Parser();
        $Parser->setPath($file);

        $this->assertEquals($Parser->getRawHeader('From'), $Parser->getRawHeader('from'));
        $this->assertEquals($Parser->getHeader('From'), $Parser->getHeader('from'));
        $this->assertEquals($Parser->getAddresses('To'), $Parser->getAddresses('to'));
    }


    public function provideAttachmentsData()
    {
        return array(
            array(
                'm0001',
                array(
                    'Content-Type: application/octet-stream; name=attach01
Content-Disposition: attachment; filename=attach01
Content-Transfer-Encoding: base64
X-Attachment-Id: f_hi0eudw60

YQo='
                )
            ),
            array(
                'm0002',
                array(
                    'Content-Type: application/octet-stream; name=attach02
Content-Disposition: attachment; filename=attach02
Content-Transfer-Encoding: base64
X-Attachment-Id: f_hi0eyes30

TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4g
VmVzdGlidWx1bSBjb25ndWUgc2VkIGFudGUgaWQgbGFvcmVldC4gUHJhZXNlbnQgZGljdHVtIHNh
cGllbiBpYWN1bGlzIG5pc2kgcGhhcmV0cmEsIHBvcnR0aXRvciBibGFuZGl0IG1hc3NhIGN1cnN1
cy4gRHVpcyByaG9uY3VzIG1hdXJpcyBhYyB1cm5hIHNlbXBlciwgc2VkIG1hbGVzdWFkYSBmZWxp
cyBpbnRlcmR1bS4gTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBp
c2NpbmcgZWxpdC4gU2VkIHB1bHZpbmFyIGRpY3R1bSBvcm5hcmUuIEN1cmFiaXR1ciBldSBkb2xv
ciBmYWNpbGlzaXMsIHNhZ2l0dGlzIHB1cnVzIHByZXRpdW0sIGNvbnNlY3RldHVyIGVsaXQuIE51
bGxhIGVsZW1lbnR1bSBhdWN0b3IgdWx0cmljZXMuIE51bmMgZmVybWVudHVtIGRpY3R1bSBvZGlv
IHZlbCB0aW5jaWR1bnQuIFNlZCBjb25zZXF1YXQgdmVzdGlidWx1bSB2ZXN0aWJ1bHVtLiBQcm9p
biBwdWx2aW5hciBmZWxpcyB2aXRhZSBlbGVtZW50dW0gc3VzY2lwaXQuCgoKTG9yZW0gaXBzdW0g
ZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gVmVzdGlidWx1bSBj
b25ndWUgc2VkIGFudGUgaWQgbGFvcmVldC4gUHJhZXNlbnQgZGljdHVtIHNhcGllbiBpYWN1bGlz
IG5pc2kgcGhhcmV0cmEsIHBvcnR0aXRvciBibGFuZGl0IG1hc3NhIGN1cnN1cy4gRHVpcyByaG9u
Y3VzIG1hdXJpcyBhYyB1cm5hIHNlbXBlciwgc2VkIG1hbGVzdWFkYSBmZWxpcyBpbnRlcmR1bS4g
TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4g
U2VkIHB1bHZpbmFyIGRpY3R1bSBvcm5hcmUuIEN1cmFiaXR1ciBldSBkb2xvciBmYWNpbGlzaXMs
IHNhZ2l0dGlzIHB1cnVzIHByZXRpdW0sIGNvbnNlY3RldHVyIGVsaXQuIE51bGxhIGVsZW1lbnR1
bSBhdWN0b3IgdWx0cmljZXMuIE51bmMgZmVybWVudHVtIGRpY3R1bSBvZGlvIHZlbCB0aW5jaWR1
bnQuIFNlZCBjb25zZXF1YXQgdmVzdGlidWx1bSB2ZXN0aWJ1bHVtLiBQcm9pbiBwdWx2aW5hciBm
ZWxpcyB2aXRhZSBlbGVtZW50dW0gc3VzY2lwaXQuCgoKTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFt
ZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gVmVzdGlidWx1bSBjb25ndWUgc2VkIGFu
dGUgaWQgbGFvcmVldC4gUHJhZXNlbnQgZGljdHVtIHNhcGllbiBpYWN1bGlzIG5pc2kgcGhhcmV0
cmEsIHBvcnR0aXRvciBibGFuZGl0IG1hc3NhIGN1cnN1cy4gRHVpcyByaG9uY3VzIG1hdXJpcyBh
YyB1cm5hIHNlbXBlciwgc2VkIG1hbGVzdWFkYSBmZWxpcyBpbnRlcmR1bS4gTG9yZW0gaXBzdW0g
ZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gU2VkIHB1bHZpbmFy
IGRpY3R1bSBvcm5hcmUuIEN1cmFiaXR1ciBldSBkb2xvciBmYWNpbGlzaXMsIHNhZ2l0dGlzIHB1
cnVzIHByZXRpdW0sIGNvbnNlY3RldHVyIGVsaXQuIE51bGxhIGVsZW1lbnR1bSBhdWN0b3IgdWx0
cmljZXMuIE51bmMgZmVybWVudHVtIGRpY3R1bSBvZGlvIHZlbCB0aW5jaWR1bnQuIFNlZCBjb25z
ZXF1YXQgdmVzdGlidWx1bSB2ZXN0aWJ1bHVtLiBQcm9pbiBwdWx2aW5hciBmZWxpcyB2aXRhZSBl
bGVtZW50dW0gc3VzY2lwaXQuCgpMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0
dXIgYWRpcGlzY2luZyBlbGl0LiBWZXN0aWJ1bHVtIGNvbmd1ZSBzZWQgYW50ZSBpZCBsYW9yZWV0
LiBQcmFlc2VudCBkaWN0dW0gc2FwaWVuIGlhY3VsaXMgbmlzaSBwaGFyZXRyYSwgcG9ydHRpdG9y
IGJsYW5kaXQgbWFzc2EgY3Vyc3VzLiBEdWlzIHJob25jdXMgbWF1cmlzIGFjIHVybmEgc2VtcGVy
LCBzZWQgbWFsZXN1YWRhIGZlbGlzIGludGVyZHVtLiBMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1l
dCwgY29uc2VjdGV0dXIgYWRpcGlzY2luZyBlbGl0LiBTZWQgcHVsdmluYXIgZGljdHVtIG9ybmFy
ZS4gQ3VyYWJpdHVyIGV1IGRvbG9yIGZhY2lsaXNpcywgc2FnaXR0aXMgcHVydXMgcHJldGl1bSwg
Y29uc2VjdGV0dXIgZWxpdC4gTnVsbGEgZWxlbWVudHVtIGF1Y3RvciB1bHRyaWNlcy4gTnVuYyBm
ZXJtZW50dW0gZGljdHVtIG9kaW8gdmVsIHRpbmNpZHVudC4gU2VkIGNvbnNlcXVhdCB2ZXN0aWJ1
bHVtIHZlc3RpYnVsdW0uIFByb2luIHB1bHZpbmFyIGZlbGlzIHZpdGFlIGVsZW1lbnR1bSBzdXNj
aXBpdC4K'
                )
            ),
            array(
                'm0008',
                array(
                    'Content-Type: image/gif; name="logo.jpg"
Content-Transfer-Encoding: base64
Content-Disposition: inline; filename="logo.jpg"
Content-ID: <ae0357e57f04b8347f7621662cb63855.jpg>

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
',
                    'Content-Type: image/gif; name="background.jpg"
Content-Transfer-Encoding: base64
Content-Disposition: inline; filename="background.jpg"
Content-ID: <4c837ed463ad29c820668e835a270e8a.jpg>

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
',
                    'Content-Type: text/plain; name="attachment.txt"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename="attachment.txt"

TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4g
VmVzdGlidWx1bSBjb25ndWUgc2VkIGFudGUgaWQgbGFvcmVldC4gUHJhZXNlbnQgZGljdHVtIHNh
cGllbiBpYWN1bGlzIG5pc2kgcGhhcmV0cmEsIHBvcnR0aXRvciBibGFuZGl0IG1hc3NhIGN1cnN1
cy4gRHVpcyByaG9uY3VzIG1hdXJpcyBhYyB1cm5hIHNlbXBlciwgc2VkIG1hbGVzdWFkYSBmZWxp
cyBpbnRlcmR1bS4gTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBp
c2NpbmcgZWxpdC4gU2VkIHB1bHZpbmFyIGRpY3R1bSBvcm5hcmUuIEN1cmFiaXR1ciBldSBkb2xv
ciBmYWNpbGlzaXMsIHNhZ2l0dGlzIHB1cnVzIHByZXRpdW0sIGNvbnNlY3RldHVyIGVsaXQuIE51
bGxhIGVsZW1lbnR1bSBhdWN0b3IgdWx0cmljZXMuIE51bmMgZmVybWVudHVtIGRpY3R1bSBvZGlv
IHZlbCB0aW5jaWR1bnQuIFNlZCBjb25zZXF1YXQgdmVzdGlidWx1bSB2ZXN0aWJ1bHVtLiBQcm9p
biBwdWx2aW5hciBmZWxpcyB2aXRhZSBlbGVtZW50dW0gc3VzY2lwaXQuCgoKTG9yZW0gaXBzdW0g
ZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gVmVzdGlidWx1bSBj
b25ndWUgc2VkIGFudGUgaWQgbGFvcmVldC4gUHJhZXNlbnQgZGljdHVtIHNhcGllbiBpYWN1bGlz
IG5pc2kgcGhhcmV0cmEsIHBvcnR0aXRvciBibGFuZGl0IG1hc3NhIGN1cnN1cy4gRHVpcyByaG9u
Y3VzIG1hdXJpcyBhYyB1cm5hIHNlbXBlciwgc2VkIG1hbGVzdWFkYSBmZWxpcyBpbnRlcmR1bS4g
TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4g
U2VkIHB1bHZpbmFyIGRpY3R1bSBvcm5hcmUuIEN1cmFiaXR1ciBldSBkb2xvciBmYWNpbGlzaXMs
IHNhZ2l0dGlzIHB1cnVzIHByZXRpdW0sIGNvbnNlY3RldHVyIGVsaXQuIE51bGxhIGVsZW1lbnR1
bSBhdWN0b3IgdWx0cmljZXMuIE51bmMgZmVybWVudHVtIGRpY3R1bSBvZGlvIHZlbCB0aW5jaWR1
bnQuIFNlZCBjb25zZXF1YXQgdmVzdGlidWx1bSB2ZXN0aWJ1bHVtLiBQcm9pbiBwdWx2aW5hciBm
ZWxpcyB2aXRhZSBlbGVtZW50dW0gc3VzY2lwaXQuCgoKTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFt
ZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gVmVzdGlidWx1bSBjb25ndWUgc2VkIGFu
dGUgaWQgbGFvcmVldC4gUHJhZXNlbnQgZGljdHVtIHNhcGllbiBpYWN1bGlzIG5pc2kgcGhhcmV0
cmEsIHBvcnR0aXRvciBibGFuZGl0IG1hc3NhIGN1cnN1cy4gRHVpcyByaG9uY3VzIG1hdXJpcyBh
YyB1cm5hIHNlbXBlciwgc2VkIG1hbGVzdWFkYSBmZWxpcyBpbnRlcmR1bS4gTG9yZW0gaXBzdW0g
ZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gU2VkIHB1bHZpbmFy
IGRpY3R1bSBvcm5hcmUuIEN1cmFiaXR1ciBldSBkb2xvciBmYWNpbGlzaXMsIHNhZ2l0dGlzIHB1
cnVzIHByZXRpdW0sIGNvbnNlY3RldHVyIGVsaXQuIE51bGxhIGVsZW1lbnR1bSBhdWN0b3IgdWx0
cmljZXMuIE51bmMgZmVybWVudHVtIGRpY3R1bSBvZGlvIHZlbCB0aW5jaWR1bnQuIFNlZCBjb25z
ZXF1YXQgdmVzdGlidWx1bSB2ZXN0aWJ1bHVtLiBQcm9pbiBwdWx2aW5hciBmZWxpcyB2aXRhZSBl
bGVtZW50dW0gc3VzY2lwaXQuCgpMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0
dXIgYWRpcGlzY2luZyBlbGl0LiBWZXN0aWJ1bHVtIGNvbmd1ZSBzZWQgYW50ZSBpZCBsYW9yZWV0
LiBQcmFlc2VudCBkaWN0dW0gc2FwaWVuIGlhY3VsaXMgbmlzaSBwaGFyZXRyYSwgcG9ydHRpdG9y
IGJsYW5kaXQgbWFzc2EgY3Vyc3VzLiBEdWlzIHJob25jdXMgbWF1cmlzIGFjIHVybmEgc2VtcGVy
LCBzZWQgbWFsZXN1YWRhIGZlbGlzIGludGVyZHVtLiBMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1l
dCwgY29uc2VjdGV0dXIgYWRpcGlzY2luZyBlbGl0LiBTZWQgcHVsdmluYXIgZGljdHVtIG9ybmFy
ZS4gQ3VyYWJpdHVyIGV1IGRvbG9yIGZhY2lsaXNpcywgc2FnaXR0aXMgcHVydXMgcHJldGl1bSwg
Y29uc2VjdGV0dXIgZWxpdC4gTnVsbGEgZWxlbWVudHVtIGF1Y3RvciB1bHRyaWNlcy4gTnVuYyBm
ZXJtZW50dW0gZGljdHVtIG9kaW8gdmVsIHRpbmNpZHVudC4gU2VkIGNvbnNlcXVhdCB2ZXN0aWJ1
bHVtIHZlc3RpYnVsdW0uIFByb2luIHB1bHZpbmFyIGZlbGlzIHZpdGFlIGVsZW1lbnR1bSBzdXNj
aXBpdC4K
'
                )
            )
        );
    }

    /**
     * @dataProvider provideAttachmentsData
     */
    public function testAttachmentGetMimePartStrFromPath($mid, $attachmentMimeParts)
    {
        // Init
        $file = __DIR__ . '/mails/' . $mid;

        $Parser = new Parser();
        $Parser->setPath($file);

        $i = 0;
        foreach ($Parser->getAttachments() as $attachment) {
            $expectedMimePart = $attachmentMimeParts[$i];
            $this->assertEquals($expectedMimePart, $attachment->getMimePartStr());
            $i++;
        }
    }

    /**
     * @dataProvider provideAttachmentsData
     */
    public function testAttachmentGetMimePartStrFromStream($mid, $attachmentMimeParts)
    {
        // Init
        $file = __DIR__ . '/mails/' . $mid;

        $Parser = new Parser();
        $Parser->setStream(fopen($file, 'r'));

        $i = 0;
        foreach ($Parser->getAttachments() as $attachment) {
            $expectedMimePart = $attachmentMimeParts[$i];
            $this->assertEquals($expectedMimePart, $attachment->getMimePartStr());
            $i++;
        }
    }

    /**
     * @dataProvider provideAttachmentsData
     */
    public function testAttachmentGetMimePartStrFromText($mid, $attachmentMimeParts)
    {
        // Init
        $file = __DIR__ . '/mails/' . $mid;

        $Parser = new Parser();
        $Parser->setText(file_get_contents($file));

        $i = 0;
        foreach ($Parser->getAttachments() as $attachment) {
            $expectedMimePart = $attachmentMimeParts[$i];
            $this->assertEquals($expectedMimePart, $attachment->getMimePartStr());
            $i++;
        }
    }
}
