<?php

declare(strict_types=1);

require_once __DIR__ . '/MarantzAVR.php';  // diverse Klassen
require_once __DIR__ . '/DenonAVR.php';  // diverse Klassen

/* internal IDs
                0 => "AVR-2313",
                1 => "AVR-3312", //
                2 => "AVR-3313", //
                3 => "AVR-3808A",
                4 => "AVR-4308A",
                5 => "AVR-4310", //
                6 => "AVR-4311", //
                7 => "AVR-X1000",
                8 => "AVR-X1100W",
                9 => "AVR-X1200W",
                10 => "AVR-X2000",
                11 => "AVR-X2100W",
                12 => "AVR-X2200W",
                13 => "AVR-X3000",
                14 => "AVR-X3100W",
                15 => "AVR-X3200W",
                16 => "AVR-X4000",
                17 => "AVR-X4100W", //
                18 => "AVR-X4200W", //
                19 => "AVR-X5200W",
                20 => "AVR-X6200W", //
                21 => "AVR-X7200W", //
                22 => "AVR-X7200WA", //
                23 => "S-700W",
                24 => "S-900W",
                25 => "AVR-1912",
                26 => "AVR-X6400H",
                27 => "AVR-X4300H",
                28 => "AVR-X3300W",
                29 => "AVR-X2300W",
                30 => "S920W",
                31 => "AVR-X1300W",
                32 => "AVR-3310", //neu
                33 => "AVR-3311", //neu
                34 => "AVR-X2400H",
                35 => "AVR-X6300H",
                36 => "AVR-X3400H",
                37 => "AVR-X1400H",
                38 => "AVR-X4400H",
                39 => "AVR-X8500H",
                40 => "DRA-N5",
                41 => "RCD-N8",
                42 => "AVR-X1500H",
                43 => "AVR-X2500H",
                44 => "AVR-X3500H",
                45 => "AVR-X4500H",
                46 => "AVR-X6500H",
                47 => "AVR-X1600H",
                48 => "AVR-X2600H",
                49 => "AVR-4810",
                200 => "AVR-S750H",

                60 => "Marantz-NR1504", //
                61 => "Marantz-NR1506", //
                62 => "Marantz-NR1602", //
                63 => "Marantz-NR1603", //
                64 => "Marantz-NR1604", //
                65 => "Marantz-NR1605", //
                66 => "Marantz-NR1606", //
                67 => "Marantz-SR5006", //
                68 => "Marantz-SR5007", //
                69 => "Marantz-SR5008", //
                70 => "Marantz-SR5009", //
                71 => "Marantz-SR5010", //
                72 => "Marantz-SR6005", //
                73 => "Marantz-SR6006", //
                74 => "Marantz-SR6007", //
                75 => "Marantz-SR6008", //
                76 => "Marantz-SR6009", //
                77 => "Marantz-SR6010", //
                78 => "Marantz-SR7005", //
                79 => "Marantz-SR7007", //
                80 => "Marantz-SR7008", //
                81 => "Marantz-SR7009", //
                82 => "Marantz-SR7010", //
                83 => "Marantz-AV7005", //
                84 => "Marantz-AV7701", //
                85 => "Marantz-AV7702", //
                86 => "Marantz-AV7702 mk II", //
                87 => "Marantz-AV8801", //
                88 => "Marantz-AV8802", //
                89 => "Marantz-SR5011", //
                90 => "Marantz-NR1607", //
                91 => "Marantz-SR6011", //
                92 => "Marantz-SR7011", //
                93 => "Marantz-AV7703", //
                94 => "Marantz-AV1508", //
                95 => "Marantz-AV1608", //
                96 => "Marantz-SR5012", //
                97 => "Marantz-SR6012", //
                98 => "Marantz-SR7012", //
                99 => "Marantz-AV7704", //
                100 => "Marantz-AV1509", //
                101 => "Marantz-AV1609", //
                102 => "Marantz-SR5013", //
                103 => "Marantz-SR6013", //
                104 => "Marantz-SR7013", //
                105 => "Marantz-AV7705", //

                50 => "None"
 */

class AVRs extends stdClass
{
    public static function getAllAVRs(): array
    {
        //supported Denon and Marantz models
        //Hint: the order of this list determines the order of selectable AVRs in IPS Instances
        return [
            Denon_AVR_3808A::$Name     => Denon_AVR_3808A::getCapabilities(),
            Denon_AVR_3310::$Name      => Denon_AVR_3310::getCapabilities(),
            Denon_AVR_3311::$Name      => Denon_AVR_3311::getCapabilities(),
            Denon_AVR_3312::$Name      => Denon_AVR_3312::getCapabilities(),
            Denon_AVR_3313::$Name      => Denon_AVR_3313::getCapabilities(),
            Denon_AVR_4310::$Name      => Denon_AVR_4310::getCapabilities(),
            Denon_AVR_4311::$Name      => Denon_AVR_4311::getCapabilities(),
            Denon_AVR_4810::$Name      => Denon_AVR_4810::getCapabilities(),
            Denon_AVR_X1100W::$Name    => Denon_AVR_X1100W::getCapabilities(),
            Denon_AVR_X1200W::$Name    => Denon_AVR_X1200W::getCapabilities(),
            Denon_AVR_X1300W::$Name    => Denon_AVR_X1300W::getCapabilities(),
            Denon_AVR_X1400H::$Name    => Denon_AVR_X1400H::getCapabilities(),
            Denon_AVR_X1500H::$Name    => Denon_AVR_X1500H::getCapabilities(),
            Denon_AVR_X1600H::$Name    => Denon_AVR_X1600H::getCapabilities(),
            Denon_AVR_X2000::$Name     => Denon_AVR_X2000::getCapabilities(),
            Denon_AVR_X2100W::$Name    => Denon_AVR_X2100W::getCapabilities(),
            Denon_AVR_X2200W::$Name    => Denon_AVR_X2200W::getCapabilities(),
            Denon_AVR_X2300W::$Name    => Denon_AVR_X2300W::getCapabilities(),
            Denon_AVR_X2400H::$Name    => Denon_AVR_X2400H::getCapabilities(),
            Denon_AVR_X2500H::$Name    => Denon_AVR_X2500H::getCapabilities(),
            Denon_AVR_X2600H::$Name    => Denon_AVR_X2600H::getCapabilities(),
            Denon_AVR_X3000::$Name     => Denon_AVR_X3000::getCapabilities(),
            Denon_AVR_X3400H::$Name    => Denon_AVR_X3400H::getCapabilities(),
            Denon_AVR_X3500H::$Name    => Denon_AVR_X3500H::getCapabilities(),
            Denon_AVR_X4000::$Name     => Denon_AVR_X4000::getCapabilities(),
            Denon_AVR_X4100W::$Name    => Denon_AVR_X4100W::getCapabilities(),
            Denon_AVR_X4200W::$Name    => Denon_AVR_X4200W::getCapabilities(),
            Denon_AVR_X4300H::$Name    => Denon_AVR_X4300H::getCapabilities(),
            Denon_AVR_X4400H::$Name    => Denon_AVR_X4400H::getCapabilities(),
            Denon_AVR_X4500H::$Name    => Denon_AVR_X4500H::getCapabilities(),
            Denon_AVR_X5200W::$Name    => Denon_AVR_X5200W::getCapabilities(),
            Denon_AVR_X6200W::$Name    => Denon_AVR_X6200W::getCapabilities(),
            Denon_AVR_X6300H::$Name    => Denon_AVR_X6300H::getCapabilities(),
            Denon_AVR_X6400H::$Name    => Denon_AVR_X6400H::getCapabilities(),
            Denon_AVR_X6500H::$Name    => Denon_AVR_X6500H::getCapabilities(),
            Denon_AVR_X7200W::$Name    => Denon_AVR_X7200W::getCapabilities(),
            Denon_AVR_X7200WA::$Name   => Denon_AVR_X7200WA::getCapabilities(),
            Denon_AVC_X8500H::$Name    => Denon_AVC_X8500H::getCapabilities(),
            Denon_AVR_S750H::$Name     => Denon_AVR_S750H::getCapabilities(),
            Denon_DRA_N5::$Name        => Denon_DRA_N5::getCapabilities(),
            Denon_RCD_N8::$Name        => Denon_RCD_N8::getCapabilities(),

            Marantz_NR1504::$Name     => Marantz_NR1504::getCapabilities(),
            Marantz_NR1506::$Name     => Marantz_NR1506::getCapabilities(),
            Marantz_NR1508::$Name     => Marantz_NR1508::getCapabilities(),
            Marantz_NR1509::$Name     => Marantz_NR1509::getCapabilities(),
            Marantz_NR1602::$Name     => Marantz_NR1602::getCapabilities(),
            Marantz_NR1603::$Name     => Marantz_NR1603::getCapabilities(),
            Marantz_NR1604::$Name     => Marantz_NR1604::getCapabilities(),
            Marantz_NR1605::$Name     => Marantz_NR1605::getCapabilities(),
            Marantz_NR1606::$Name     => Marantz_NR1606::getCapabilities(),
            Marantz_NR1607::$Name     => Marantz_NR1607::getCapabilities(),
            Marantz_NR1608::$Name     => Marantz_NR1608::getCapabilities(),
            Marantz_NR1609::$Name     => Marantz_NR1609::getCapabilities(),
            Marantz_SR5006::$Name     => Marantz_SR5006::getCapabilities(),
            Marantz_SR5007::$Name     => Marantz_SR5007::getCapabilities(),
            Marantz_SR5008::$Name     => Marantz_SR5008::getCapabilities(),
            Marantz_SR5009::$Name     => Marantz_SR5009::getCapabilities(),
            Marantz_SR5010::$Name     => Marantz_SR5010::getCapabilities(),
            Marantz_SR5011::$Name     => Marantz_SR5011::getCapabilities(),
            Marantz_SR5012::$Name     => Marantz_SR5012::getCapabilities(),
            Marantz_SR5013::$Name     => Marantz_SR5013::getCapabilities(),
            Marantz_SR6005::$Name     => Marantz_SR6005::getCapabilities(),
            Marantz_SR6006::$Name     => Marantz_SR6006::getCapabilities(),
            Marantz_SR6007::$Name     => Marantz_SR6007::getCapabilities(),
            Marantz_SR6008::$Name     => Marantz_SR6008::getCapabilities(),
            Marantz_SR6009::$Name     => Marantz_SR6009::getCapabilities(),
            Marantz_SR6010::$Name     => Marantz_SR6010::getCapabilities(),
            Marantz_SR6011::$Name     => Marantz_SR6011::getCapabilities(),
            Marantz_SR6012::$Name     => Marantz_SR6012::getCapabilities(),
            Marantz_SR6013::$Name     => Marantz_SR6013::getCapabilities(),
            Marantz_SR7005::$Name     => Marantz_SR7005::getCapabilities(),
            Marantz_SR7007::$Name     => Marantz_SR7007::getCapabilities(),
            Marantz_SR7008::$Name     => Marantz_SR7008::getCapabilities(),
            Marantz_SR7009::$Name     => Marantz_SR7009::getCapabilities(),
            Marantz_SR7010::$Name     => Marantz_SR7010::getCapabilities(),
            Marantz_SR7011::$Name     => Marantz_SR7011::getCapabilities(),
            Marantz_SR7012::$Name     => Marantz_SR7012::getCapabilities(),
            Marantz_SR7013::$Name     => Marantz_SR7013::getCapabilities(),
            Marantz_AV7005::$Name     => Marantz_AV7005::getCapabilities(),
            Marantz_AV7701::$Name     => Marantz_AV7701::getCapabilities(),
            Marantz_AV7702::$Name     => Marantz_AV7702::getCapabilities(),
            Marantz_AV7702MKII::$Name => Marantz_AV7702MKII::getCapabilities(),
            Marantz_AV7703::$Name     => Marantz_AV7703::getCapabilities(),
            Marantz_AV7704::$Name     => Marantz_AV7704::getCapabilities(),
            Marantz_AV7705::$Name     => Marantz_AV7705::getCapabilities(),
            Marantz_AV8801::$Name     => Marantz_AV8801::getCapabilities(),
            Marantz_AV8802::$Name     => Marantz_AV8802::getCapabilities(),
        ];
    }

    public static function getCapabilities($AVRType)
    {
        $caps = self::getAllAVRs()[$AVRType];
        if (($caps['httpMainZone'] !== DENON_HTTP_Interface::NoHTTPInterface) && (count($caps['SI_SubCommands']) > 0)){
            trigger_error('Faulty configuration: No SI_SubCommands expected when httpMainZone is set', E_USER_ERROR);
        } elseif (($caps['httpMainZone'] === DENON_HTTP_Interface::NoHTTPInterface) && (count($caps['SI_SubCommands']) === 0)){
            trigger_error('Faulty configuration: No SI_SubCommands defined although httpMainZone is not set', E_USER_ERROR);
        }
        return $caps;
    }
}

class AVR extends stdClass
{
    public static $Name = __CLASS__;
    public static $internalID;

    public static $InfoFunctions = ['MainZoneName', 'Model'];
    public static $InfoFunctions_max = ['MainZoneName', 'Model'];

    public static $PowerFunctions = [
        DENON_API_Commands::PW,
        DENON_API_Commands::ZM,
        DENON_API_Commands::SLP,
        DENON_API_Commands::MU,
    ];
    public static $PowerFunctions_max = [
        DENON_API_Commands::PW,
        DENON_API_Commands::ZM,
        DENON_API_Commands::MU,
        DENON_API_Commands::STBY,
        DENON_API_Commands::ECO,
        DENON_API_Commands::SLP,
    ];

    public static $InputSettings = [];
    public static $InputSettings_max = [
        DENON_API_Commands::SI,
        DENON_API_Commands::MSSMART,
        DENON_API_Commands::MSQUICK,
        DENON_API_Commands::SD,
        DENON_API_Commands::DC,
        DENON_API_Commands::SV,
    ];
    public static $SI_SubCommands = [];
    public static $SV_SubCommands = [
        DENON_API_Commands::DVD,
        DENON_API_Commands::BD,
        DENON_API_Commands::TV,
        DENON_API_Commands::SAT_CBL,
        DENON_API_Commands::DVR,
        DENON_API_Commands::GAME,
        DENON_API_Commands::GAME2,
        DENON_API_Commands::VAUX,
        DENON_API_Commands::DOCK,
        DENON_API_Commands::ON,
        DENON_API_Commands::OFF,
    ];

    public static $SurroundMode = [DENON_API_Commands::MS, DENON_API_Commands::SURROUNDDISPLAY];
    public static $SurroundMode_max = [DENON_API_Commands::MS, DENON_API_Commands::SURROUNDDISPLAY];

    public static $MS_SubCommands = [DENON_API_Commands::MSDIRECT,
        DENON_API_Commands::MSSTEREO,
        DENON_API_Commands::MSDOLBYDIGITAL,
        DENON_API_Commands::MSDTSSURROUND,
        DENON_API_Commands::MSMCHSTEREO,
        DENON_API_Commands::MSVIRTUAL,
    ];
    public static $CV_Commands = [
        DENON_API_Commands::MV,
        DENON_API_Commands::CVFL, DENON_API_Commands::CVFR, DENON_API_Commands::CVC,
        DENON_API_Commands::CVSW,
        DENON_API_Commands::CVSL, DENON_API_Commands::CVSR,
    ];
    public static $CV_Commands_max = [
        DENON_API_Commands::MV,
        DENON_API_Commands::CVFL, DENON_API_Commands::CVFR, DENON_API_Commands::CVC,
        DENON_API_Commands::CVSW,
        DENON_API_Commands::CVSW2,
        DENON_API_Commands::CVSL, DENON_API_Commands::CVSR,
        DENON_API_Commands::CVSBL, DENON_API_Commands::CVSBR, DENON_API_Commands::CVSB,
        DENON_API_Commands::CVFHL, DENON_API_Commands::CVFHR,
        DENON_API_Commands::CVFWL, DENON_API_Commands::CVFWR,
        DENON_API_Commands::CVTFL, DENON_API_Commands::CVTFR,
        DENON_API_Commands::CVTML, DENON_API_Commands::CVTMR,
        DENON_API_Commands::CVTRL, DENON_API_Commands::CVTRR,
        DENON_API_Commands::CVRHL, DENON_API_Commands::CVRHR,
        DENON_API_Commands::CVFDL, DENON_API_Commands::CVFDR,
        DENON_API_Commands::CVSDL, DENON_API_Commands::CVSDR,
        DENON_API_Commands::CVBDL, DENON_API_Commands::CVBDR,
        DENON_API_Commands::CVSHL, DENON_API_Commands::CVSHR, DENON_API_Commands::CVTS,
        DENON_API_Commands::CVCH,
        DENON_API_Commands::CVZRL,
    ];
    public static $VS_Commands = [
        DENON_API_Commands::VSMONI,
        DENON_API_Commands::VSSC, DENON_API_Commands::VSSCH,
        DENON_API_Commands::VSVST,
        DENON_API_Commands::VSAUDIO,
        DENON_API_Commands::VSVPM,
    ];
    public static $VS_Commands_max = [
        DENON_API_Commands::VSASP,
        DENON_API_Commands::VSMONI,
        DENON_API_Commands::VSSC, DENON_API_Commands::VSSCH,
        DENON_API_Commands::VSVST,
        DENON_API_Commands::VSAUDIO,
        DENON_API_Commands::VSVPM,
    ];
    public static $VSSC_SubCommands = [];
    public static $VSSCH_SubCommands = [];

    public static $SystemControl_Commands = [
        DENON_API_Commands::MN,
        DENON_API_Commands::MNMEN,
        DENON_API_Commands::DISPLAY,
        DENON_API_Commands::NS,
    ];
    public static $SystemControl_Commands_max = [
        DENON_API_Commands::MN,
        DENON_API_Commands::MNMEN,
        DENON_API_Commands::MNSRC,
        DENON_API_Commands::MNZST,
        DENON_API_Commands::DIM,
        DENON_API_Commands::SSHOSALS,
        DENON_API_Commands::DISPLAY,
        DENON_API_Commands::NS,
    ];
    public static $PS_Commands = [];
    public static $PS_Commands_max = [
        DENON_API_Commands::PSFRONT,
        DENON_API_Commands::PSSP,
        DENON_API_Commands::PSFH,
        DENON_API_Commands::PSSWR,
        DENON_API_Commands::PSTONECTRL,
        DENON_API_Commands::PSBAS, DENON_API_Commands::PSTRE,
        DENON_API_Commands::PSLOM,
        DENON_API_Commands::PSBSC,
        DENON_API_Commands::PSDEH,
        DENON_API_Commands::PSSWL,
        DENON_API_Commands::PSSWL2,
        DENON_API_Commands::PSDIL,
        DENON_API_Commands::PSCLV,
        DENON_API_Commands::PSLFE,
        DENON_API_Commands::PSLFL,
        DENON_API_Commands::PSPAN,
        DENON_API_Commands::PSDIM,
        DENON_API_Commands::PSCEN,
        DENON_API_Commands::PSCES,
        DENON_API_Commands::PSSPV,
        DENON_API_Commands::PSCEI,
        DENON_API_Commands::PSCEG,
        DENON_API_Commands::PSDIC,
        DENON_API_Commands::PSNEURAL,
        DENON_API_Commands::PSMODE,
        DENON_API_Commands::PSPHG,
        DENON_API_Commands::PSDSX,
        DENON_API_Commands::PSSTW, DENON_API_Commands::PSSTH,
        DENON_API_Commands::PSCINEMAEQ,
        DENON_API_Commands::PSHTEQ,
        DENON_API_Commands::PSMULTEQ,
        DENON_API_Commands::PSDYNEQ,
        DENON_API_Commands::PSREFLEV,
        DENON_API_Commands::PSDYNVOL,
        DENON_API_Commands::PSLFC,
        DENON_API_Commands::PSCNTAMT,
        DENON_API_Commands::PSGEQ,
        DENON_API_Commands::PSHEQ,
        DENON_API_Commands::PSDRC,
        DENON_API_Commands::PSDCO,
        DENON_API_Commands::PSMDAX,
        DENON_API_Commands::PSDELAY,
        DENON_API_Commands::PSAUROPR, DENON_API_Commands::PSAUROST,
        //Denon only
        DENON_API_Commands::PSDOLVOL, DENON_API_Commands::PSVOLMOD, DENON_API_Commands::PSVOLLEV, // only Denon 4311
        DENON_API_Commands::PSSB,  //only some Denon models
        DENON_API_Commands::PSATT, //only some Denon models
        DENON_API_Commands::PSEFF,
        DENON_API_Commands::PSDEL,
        DENON_API_Commands::PSAFD,
        DENON_API_Commands::PSRSZ,
        DENON_API_Commands::PSRSTR,
    ];
    public static $PSSP_SubCommands = [];
    public static $PSDYNVOL_SubCommands = [ //bei neueren Geräten
        DENON_API_Commands::DYNVOLOFF,
        DENON_API_Commands::DYNVOLLIT,
        DENON_API_Commands::DYNVOLMED,
        DENON_API_Commands::DYNVOLHEV,
    ];
    public static $PV_Commands = [];
    public static $PV_Commands_max = [
        DENON_API_Commands::PVPICT,
        DENON_API_Commands::PVCN, DENON_API_Commands::PVBR,
        DENON_API_Commands::PVST,
        DENON_API_Commands::PVCM, DENON_API_Commands::PVHUE,
        DENON_API_Commands::PVDNR, DENON_API_Commands::PVENH,
    ];
    public static $Zone_Commands = [];
    public static $Zone_Commands_max = [
        DENON_API_Commands::Z2POWER, DENON_API_Commands::Z3POWER,
        DENON_API_Commands::Z2INPUT, DENON_API_Commands::Z3INPUT,
        DENON_API_Commands::Z2VOL, DENON_API_Commands::Z3VOL,
        DENON_API_Commands::Z2MU, DENON_API_Commands::Z3MU,
        DENON_API_Commands::Z2SMART, DENON_API_Commands::Z3SMART, //only Marantz
        DENON_API_Commands::Z2QUICK, DENON_API_Commands::Z3QUICK, //only Denon
        DENON_API_Commands::Z2STBY, DENON_API_Commands::Z3STBY,
        DENON_API_Commands::Z2CS, DENON_API_Commands::Z3CS,
        DENON_API_Commands::Z2CVFL, DENON_API_Commands::Z3CVFL, DENON_API_Commands::Z2CVFR, DENON_API_Commands::Z3CVFR,
        DENON_API_Commands::Z2HPF, DENON_API_Commands::Z3HPF,
        DENON_API_Commands::Z2HDA,
        DENON_API_Commands::Z2PSBAS, DENON_API_Commands::Z3PSBAS,
        DENON_API_Commands::Z2PSTRE, DENON_API_Commands::Z3PSTRE,
        DENON_API_Commands::Z2SLP, DENON_API_Commands::Z3SLP,
        'Model', 'Zone2Name', 'Zone3Name',
    ];

    public static $httpMainZone = DENON_HTTP_Interface::MainForm;

    public static function getCapabilities(): array
    {
        return ['Name'               => static::$Name,
            'internalID'             => static::$internalID,
            'Manufacturer'           => static::$Manufacturer,
            'InfoFunctions'          => static::$InfoFunctions,
            'PowerFunctions'         => static::$PowerFunctions,
            'InputSettings'          => static::$InputSettings,
            'SurroundMode'           => static::$SurroundMode,
            'MS_SubCommands'         => static::$MS_SubCommands,
            'SI_SubCommands'         => static::$SI_SubCommands,
            'SV_SubCommands'         => static::$SV_SubCommands,
            'CV_Commands'            => static::$CV_Commands,
            'PS_Commands'            => static::$PS_Commands,
            'PSSP_SubCommands'       => static::$PSSP_SubCommands,
            'PSDYNVOL_SubCommands'   => static::$PSDYNVOL_SubCommands,
            'VS_Commands'            => static::$VS_Commands,
            'VSSC_SubCommands'       => static::$VSSC_SubCommands,
            'VSSCH_SubCommands'      => static::$VSSCH_SubCommands,
            'PV_Commands'            => static::$PV_Commands,
            'Zone_Commands'          => static::$Zone_Commands,
            'SystemControl_Commands' => static::$SystemControl_Commands,
            'httpMainZone'           => static::$httpMainZone,
        ];
    }

    public function getAVRCapabilities($AVRType)
    {
        switch ($AVRType) {
            case Denon_AVR_X3000::$Name:
                return new Denon_AVR_X3000();
            case Denon_AVR_X3400H::$Name:
                return new Denon_AVR_X3400H();
            case Denon_AVR_X3500H::$Name:
                return new Denon_AVR_X3500H();
            case Denon_AVR_3310::$Name:
                return new Denon_AVR_3310();
            case Denon_AVR_3311::$Name:
                return new Denon_AVR_3311();
            case Denon_AVR_3312::$Name:
                return new Denon_AVR_3312();
            case Denon_AVR_3313::$Name:
                return new Denon_AVR_3313();
            case Denon_AVR_4310::$Name:
                return new Denon_AVR_4310();
            case Denon_AVR_4311::$Name:
                return new Denon_AVR_4311();
            case Denon_AVR_4810::$Name:
                return new Denon_AVR_4810();
            case Denon_AVR_X2000::$Name:
                return new Denon_AVR_X2000();
            case Denon_AVR_X2100W::$Name:
                return new Denon_AVR_X2100W();
            case Denon_AVR_X2200W::$Name:
                return new Denon_AVR_X2200W();
            case Denon_AVR_X2300W::$Name:
                return new Denon_AVR_X2300W();
            case Denon_AVR_X2400H::$Name:
                return new Denon_AVR_X2400H();
            case Denon_AVR_X2500H::$Name:
                return new Denon_AVR_X2500H();
            case Denon_AVR_X2600H::$Name:
                return new Denon_AVR_X2600H();
            case Denon_AVR_X4100W::$Name:
                return new Denon_AVR_X4100W();
            case Denon_AVR_X4200W::$Name:
                return new Denon_AVR_X4200W();
            case Denon_AVR_X4300H::$Name:
                return new Denon_AVR_X4300H();
            case Denon_AVR_X4400H::$Name:
                return new Denon_AVR_X4400H();
            case Denon_AVR_X5200W::$Name:
                return new Denon_AVR_X5200W();
            case Denon_AVR_X6200W::$Name:
                return new Denon_AVR_X6200W();
            case Denon_AVR_X6400H::$Name:
                return new Denon_AVR_X6400H();
            case Denon_AVR_X7200W::$Name:
                return new Denon_AVR_X7200W();
            case Denon_AVR_X7200WA::$Name:
                return new Denon_AVR_X7200WA();
            case Denon_AVC_X8500H::$Name:
                return new Denon_AVC_X8500H();
            case Denon_AVR_S750H::$Name:
                return new Denon_AVR_S750H();
            case Marantz_NR1504::$Name:
                return new Marantz_NR1504();
            case Marantz_NR1506::$Name:
                return new Marantz_NR1506();
            case Marantz_NR1508::$Name:
                return new Marantz_NR1508();
            case Marantz_NR1509::$Name:
                return new Marantz_NR1509();
            case Marantz_NR1602::$Name:
                return new Marantz_NR1602();
            case Marantz_NR1603::$Name:
                return new Marantz_NR1603();
            case Marantz_NR1604::$Name:
                return new Marantz_NR1604();
            case Marantz_NR1605::$Name:
                return new Marantz_NR1605();
            case Marantz_NR1606::$Name:
                return new Marantz_NR1606();
            case Marantz_NR1607::$Name:
                return new Marantz_NR1607();
            case Marantz_NR1608::$Name:
                return new Marantz_NR1608();
            case Marantz_NR1609::$Name:
                return new Marantz_NR1609();
            case Marantz_SR5006::$Name:
                return new Marantz_SR5006();
            case Marantz_SR5007::$Name:
                return new Marantz_SR5007();
            case Marantz_SR5008::$Name:
                return new Marantz_SR5008();
            case Marantz_SR5009::$Name:
                return new Marantz_SR5009();
            case Marantz_SR5010::$Name:
                return new Marantz_SR5010();
            case Marantz_SR5011::$Name:
                return new Marantz_SR5011();
            case Marantz_SR5012::$Name:
                return new Marantz_SR5012();
            case Marantz_SR5013::$Name:
                return new Marantz_SR5013();
            case Marantz_SR6005::$Name:
                return new Marantz_SR6005();
            case Marantz_SR6006::$Name:
                return new Marantz_SR6006();
            case Marantz_SR6007::$Name:
                return new Marantz_SR6007();
            case Marantz_SR6008::$Name:
                return new Marantz_SR6008();
            case Marantz_SR6009::$Name:
                return new Marantz_SR6009();
            case Marantz_SR6010::$Name:
                return new Marantz_SR6010();
            case Marantz_SR6011::$Name:
                return new Marantz_SR6011();
            case Marantz_SR6012::$Name:
                return new Marantz_SR6012();
            case Marantz_SR6013::$Name:
                return new Marantz_SR6013();
            case Marantz_AV7005::$Name:
                return new Marantz_AV7005();
            case Marantz_SR7010::$Name:
                return new Marantz_SR7010();
            case Marantz_SR7011::$Name:
                return new Marantz_SR7011();
            case Marantz_SR7012::$Name:
                return new Marantz_SR7012();
            case Marantz_SR7013::$Name:
                return new Marantz_SR7013();
            case Marantz_AV7701::$Name:
                return new Marantz_AV7701();
            case Marantz_AV7702::$Name:
                return new Marantz_AV7702();
            case Marantz_AV7702MKII::$Name:
                return new Marantz_AV7702MKII();
            case Marantz_AV7703::$Name:
                return new Marantz_AV7703();
            case Marantz_AV7704::$Name:
                return new Marantz_AV7704();
            case Marantz_AV7705::$Name:
                return new Marantz_AV7705();
            case Marantz_AV8801::$Name:
                return new Marantz_AV8801();
            case Marantz_AV8802::$Name:
                return new Marantz_AV8802();
            default:
                trigger_error('unknown AVRType: ' . $AVRType);
                return false;
        }
    }

    public function getAVRCapabilitiesByAVRId($id)
    {
        foreach (AVRs::getAllAVRs() as $AVRType => $Caps) {
            if ($Caps['internalID'] === $id) {
                return $Caps;
            }
        }
        trigger_error(__FUNCTION__ . ': id not found: ' . $id);

        return false;
    }
}
