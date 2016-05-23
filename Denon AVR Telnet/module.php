<?

require_once(__DIR__ . "/../DenonClass.php");  // diverse Klassen

class DenonAVRTelnet extends IPSModule
{

   
    public function Create()
    {
        //Never delete this line!
        parent::Create();

        // 1. Verf�gbarer DenonSplitter wird verbunden oder neu erzeugt, wenn nicht vorhanden.
        $this->ConnectParent("{9AE3087F-DC25-4ADB-AB46-AD7455E71032}");
		
		$this->RegisterPropertyInteger("AVRType", 50);
		$this->RegisterPropertyInteger("Zone", 6);
		$this->RegisterPropertyBoolean("SurroundDisplay", false);
		$this->RegisterPropertyBoolean("Navigation", false);
		$this->RegisterPropertyBoolean("ZoneName", false);
		$this->RegisterPropertyBoolean("FL", false);
		$this->RegisterPropertyBoolean("FR", false);
		$this->RegisterPropertyBoolean("C", false);
		$this->RegisterPropertyBoolean("SW", false);
		$this->RegisterPropertyBoolean("SW2", false);
		$this->RegisterPropertyBoolean("SL", false);
		$this->RegisterPropertyBoolean("SR", false);
		$this->RegisterPropertyBoolean("SBL", false);
		$this->RegisterPropertyBoolean("SBR", false);
		$this->RegisterPropertyBoolean("SB", false);
		$this->RegisterPropertyBoolean("FHL", false);
		$this->RegisterPropertyBoolean("FHR", false);
		$this->RegisterPropertyBoolean("FWL", false);
		$this->RegisterPropertyBoolean("FWR", false);
		$this->RegisterPropertyBoolean('CinemaEQ', false);
		$this->RegisterPropertyBoolean('Panorama', false);
		$this->RegisterPropertyBoolean('FrontHeight', false);
		$this->RegisterPropertyBoolean('ToneCTRL', false);
		$this->RegisterPropertyBoolean('DynamicEQ', false);
		$this->RegisterPropertyBoolean('AudioDelay', false);
		$this->RegisterPropertyBoolean('LFELevel', false);
		$this->RegisterPropertyBoolean('QuickSelect', false);
		$this->RegisterPropertyBoolean('Sleep', false);
		$this->RegisterPropertyBoolean('DigitalInputMode', false);
		$this->RegisterPropertyBoolean('SurroundPlayMode', false);
		$this->RegisterPropertyBoolean('MultiEQMode', false);
		$this->RegisterPropertyBoolean('AudioRestorer', false);
		$this->RegisterPropertyBoolean('BassLevel', false);
		$this->RegisterPropertyBoolean('TrebleLevel', false);
		$this->RegisterPropertyBoolean('Dimension', false);
		$this->RegisterPropertyBoolean('DynamicVolume', false);
		$this->RegisterPropertyBoolean('RoomSize', false);
		$this->RegisterPropertyBoolean('DynamicCompressor', false);
		$this->RegisterPropertyBoolean('CenterWidth', false);
		$this->RegisterPropertyBoolean('DynamicRange', false);
		$this->RegisterPropertyBoolean('VideoSelect', false);
		$this->RegisterPropertyBoolean('SurroundBackMode', false);
		$this->RegisterPropertyBoolean('InputMode', false);
		$this->RegisterPropertyBoolean('Contrast', false);
		$this->RegisterPropertyBoolean('Brightness', false);
		$this->RegisterPropertyBoolean('Chromalevel', false);
		$this->RegisterPropertyBoolean('Hue', false);
		$this->RegisterPropertyBoolean('Enhancer', false);
		$this->RegisterPropertyBoolean('Subwoofer', false);
		$this->RegisterPropertyBoolean('SubwooferATT', false);
		$this->RegisterPropertyBoolean('DNRDirectChange', false);
		$this->RegisterPropertyBoolean('Effect', false);
		$this->RegisterPropertyBoolean('AFDM', false);
		$this->RegisterPropertyBoolean('EffectLevel', false);
		$this->RegisterPropertyBoolean('CenterImage', false);
		$this->RegisterPropertyBoolean('StageWidth', false);
		$this->RegisterPropertyBoolean('StageHeight', false);
		$this->RegisterPropertyBoolean('AudysseyDSX', false);
		$this->RegisterPropertyBoolean('ReferenceLevel', false);
		$this->RegisterPropertyBoolean('DRCDirectChange', false);
		$this->RegisterPropertyBoolean('SpeakerOutputFront', false);
		//$this->RegisterPropertyBoolean('DCOMPDirectChange', false);
		$this->RegisterPropertyBoolean('HDMIMonitor', false);
		$this->RegisterPropertyBoolean('ASP', false);
		$this->RegisterPropertyBoolean('Resolution', false);
		$this->RegisterPropertyBoolean('ResolutionHDMI', false);
		$this->RegisterPropertyBoolean('HDMIAudioOutput', false);
		$this->RegisterPropertyBoolean('VideoProcessingMode', false);
		$this->RegisterPropertyBoolean('DolbyVolumeLeveler', false);
		$this->RegisterPropertyBoolean('DolbyVolumeModeler', false);
		$this->RegisterPropertyBoolean('PLIIZHeightGain', false);
		$this->RegisterPropertyBoolean('VerticalStretch', false);
		$this->RegisterPropertyBoolean('DolbyVolume', false);
		$this->RegisterPropertyBoolean("Model", false);
		$this->RegisterPropertyBoolean("GUIMenu", false);
		$this->RegisterPropertyBoolean("GUIMenuSource", false);
		$this->RegisterPropertyBoolean("Z2CVFL", false);
		$this->RegisterPropertyBoolean("Z2CVFR", false);
		$this->RegisterPropertyBoolean("Z2HPF", false);
		$this->RegisterPropertyBoolean("Z2Sleep", false);
		$this->RegisterPropertyBoolean("Z2Channel", false);
		$this->RegisterPropertyBoolean("Z2Quick", false);
		$this->RegisterPropertyBoolean("Z3CVFL", false);
		$this->RegisterPropertyBoolean("Z3CVFR", false);
		$this->RegisterPropertyBoolean("Z3HPF", false);
		$this->RegisterPropertyBoolean("Z3Sleep", false);
		$this->RegisterPropertyBoolean("Z3Channel", false);
		$this->RegisterPropertyBoolean("Z3Quick", false);
		$this->RegisterPropertyBoolean("NEOToggle", false);
		$this->RegisterPropertyInteger("NEOToggleCategoryID", 0);
		$this->RegisterPropertyBoolean("Display", false);
		
		//Zusatz ab AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
		$this->RegisterPropertyBoolean("GraphicEQ", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
		$this->RegisterPropertyBoolean("Centerspread", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X7200WA / AVR-X6200W / AVR-X4200W 
		$this->RegisterPropertyBoolean("AuroMatic3DPreset", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X7200WA / AVR-X6200W / AVR-X4200W 
		$this->RegisterPropertyBoolean("AuroMatic3DStrength", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X7200WA / AVR-X6200W / AVR-X4200W 
		$this->RegisterPropertyBoolean("ZONE2AutoStandbySetting", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W
		$this->RegisterPropertyBoolean("ZONE3AutoStandbySetting", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W
		$this->RegisterPropertyBoolean("Dimmer", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W
		$this->RegisterPropertyBoolean("DialogLevelAdjust", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
		$this->RegisterPropertyBoolean("MAINZONEAutoStandbySetting", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
		$this->RegisterPropertyBoolean("MAINZONEECOModeSetting", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
		$this->RegisterPropertyBoolean("SurroundHeightLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X7200WA / AVR-X6200W / AVR-X4200W 
		$this->RegisterPropertyBoolean("SurroundHeightRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X7200WA / AVR-X6200W / AVR-X4200W 
		$this->RegisterPropertyBoolean("TopSurround", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X7200WA / AVR-X6200W / AVR-X4200W 
		
		$this->RegisterPropertyBoolean("TopFrontLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("TopFrontRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("TopMiddleLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("TopMiddleRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("TopRearLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("TopRearRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("RearHeightLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("RearHeightRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("FrontDolbyLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("FrontDolbyRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("SurroundDolbyLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("SurroundDolbyRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("BackDolbyLch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		$this->RegisterPropertyBoolean("BackDolbyRch", false); //AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W
		
		//Zus�tzliche Inputs
		$this->RegisterPropertyBoolean("FAVORITES", false);
		$this->RegisterPropertyBoolean("IRADIO", false);
		$this->RegisterPropertyBoolean("SERVER", false);
		$this->RegisterPropertyBoolean("NAPSTER", false);
		$this->RegisterPropertyBoolean("LASTFM", false);
		$this->RegisterPropertyBoolean("FLICKR", false);
    }
	
    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
		//$this->RegisterVariableString("BufferIN", "BufferIN", "", 1);
        //IPS_SetHidden($this->GetIDForIdent('BufferIN'), true);
		
		$this->ValidateConfiguration();
		
	}
		
	/**
    * Die folgenden Funktionen stehen automatisch zur Verf�gung, wenn das Modul �ber die "Module Control" eingef�gt wurden.
    * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verf�gung gestellt:
    *
    */

	public 	$InputSources;
	public 	$VarMappingInputs;
	
	private function ValidateConfiguration()
	{
		//Zone pr�fen
		$Zone = $this->ReadPropertyInteger('Zone');
		$AVRType = $this->ReadPropertyInteger('AVRType');
		
		//Import Kategorie NEO
		$vNEOToggle = $this->ReadPropertyBoolean('NEOToggle');
		if ($vNEOToggle)
		{
			$NEOCategoryID = $this->ReadPropertyInteger('NEOToggleCategoryID');
			if ( $NEOCategoryID === 0)
				{
					// Status Error Kategorie zum Import ausw�hlen
					$this->SetStatus(211);
				}
		}
		if ($Zone == 6)
		{
			// Error Zone ausw�hlen
			$this->SetStatus(212);
		}
		if ($AVRType == 50)
		{
			// Error AVR Type ausw�hlen
			$this->SetStatus(213);
		}
		
		if (($Zone == 0) && ($AVRType !== 50)) //Mainzone
		{
			//Profilnamen anlegen
			$DenonAVRVar = new DENONIPSProfiles;
			$AVRType = $this->GetAVRType();
			//AVRType und Zone
			$DenonAVRVar->AVRType = $AVRType;
			$DenonAVRVar->Zone = $this->ReadPropertyInteger('Zone');
			$DenonAVRVar->ptChannelVolumeFL = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeFL";
			$DenonAVRVar->ptChannelVolumeFR = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeFR";
			$DenonAVRVar->ptChannelVolumeC = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeC";
			$DenonAVRVar->ptChannelVolumeSW = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSW";
			$DenonAVRVar->ptChannelVolumeSW2 = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSW2";
			$DenonAVRVar->ptChannelVolumeSL = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSL";
			$DenonAVRVar->ptChannelVolumeSR = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSR";
			$DenonAVRVar->ptChannelVolumeSBL = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSBL";
			$DenonAVRVar->ptChannelVolumeSBR = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSBR";
			$DenonAVRVar->ptChannelVolumeSB = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeSB";
			$DenonAVRVar->ptChannelVolumeFHL = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeFHL";
			$DenonAVRVar->ptChannelVolumeFHR = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeFHR";
			$DenonAVRVar->ptChannelVolumeFWL = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeFWL";
			$DenonAVRVar->ptChannelVolumeFWR = "DENON.".$DenonAVRVar->AVRType.".ChannelVolumeFWR";
			$DenonAVRVar->ptPower = 'DENON.'.$DenonAVRVar->AVRType.'.Power';
			$DenonAVRVar->ptMainZonePower = 'DENON.'.$DenonAVRVar->AVRType.'.MainZonePower';
			$DenonAVRVar->ptMainMute = 'DENON.'.$DenonAVRVar->AVRType.'.MainMute';
			$DenonAVRVar->ptCinemaEQ = 'DENON.'.$DenonAVRVar->AVRType.'.CinemaEQ';
			$DenonAVRVar->ptPanorama = 'DENON.'.$DenonAVRVar->AVRType.'.Panorama';
			$DenonAVRVar->ptFrontHeight = 'DENON.'.$DenonAVRVar->AVRType.'.FrontHeight';
			$DenonAVRVar->ptToneCTRL = 'DENON.'.$DenonAVRVar->AVRType.'.ToneCTRL';
			$DenonAVRVar->ptDynamicEQ = 'DENON.'.$DenonAVRVar->AVRType.'.DynamicEQ';
			$DenonAVRVar->ptMasterVolume = 'DENON.'.$DenonAVRVar->AVRType.'.MasterVolume';
			$DenonAVRVar->ptInputSource = 'DENON.'.$DenonAVRVar->AVRType.'.Inputsource';
			$DenonAVRVar->ptAudioDelay = 'DENON.'.$DenonAVRVar->AVRType.'.AudioDelay';
			$DenonAVRVar->ptLFELevel = 'DENON.'.$DenonAVRVar->AVRType.'.LFELevel';
			$DenonAVRVar->ptQuickSelect = 'DENON.'.$DenonAVRVar->AVRType.'.QuickSelect';
			$DenonAVRVar->ptSleep = 'DENON.'.$DenonAVRVar->AVRType.'.Sleep';
			$DenonAVRVar->ptDigitalInputMode = 'DENON.'.$DenonAVRVar->AVRType.'.DigitalInputMode';
			$DenonAVRVar->ptSurroundMode = 'DENON.'.$DenonAVRVar->AVRType.'.SurroundMode';
			$DenonAVRVar->ptSurroundPlayMode = 'DENON.'.$DenonAVRVar->AVRType.'.SurroundPlayMode';
			$DenonAVRVar->ptMultiEQMode = 'DENON.'.$DenonAVRVar->AVRType.'.MultiEQMode';
			$DenonAVRVar->ptAudioRestorer = 'DENON.'.$DenonAVRVar->AVRType.'.AudioRestorer';
			$DenonAVRVar->ptBassLevel = 'DENON.'.$DenonAVRVar->AVRType.'.BassLevel';
			$DenonAVRVar->ptTrebleLevel = 'DENON.'.$DenonAVRVar->AVRType.'.TrebleLevel';
			$DenonAVRVar->ptDimension = 'DENON.'.$DenonAVRVar->AVRType.'.Dimension';
			$DenonAVRVar->ptDynamicVolume = 'DENON.'.$DenonAVRVar->AVRType.'.DynamicVolume';
			$DenonAVRVar->ptRoomSize = 'DENON.'.$DenonAVRVar->AVRType.'.RoomSize';
			$DenonAVRVar->ptDynamicCompressor = 'DENON.'.$DenonAVRVar->AVRType.'.DynamicCompressor';
			$DenonAVRVar->ptCenterWidth = 'DENON.'.$DenonAVRVar->AVRType.'.CenterWidth';
			$DenonAVRVar->ptDynamicRange = 'DENON.'.$DenonAVRVar->AVRType.'.DynamicRange';
			$DenonAVRVar->ptVideoSelect = 'DENON.'.$DenonAVRVar->AVRType.'.VideoSelect';
			$DenonAVRVar->ptSurroundBackMode = 'DENON.'.$DenonAVRVar->AVRType.'.SurroundBackMode';
			$DenonAVRVar->ptPreset = 'DENON.'.$DenonAVRVar->AVRType.'.Preset';
			$DenonAVRVar->ptInputMode = 'DENON.'.$DenonAVRVar->AVRType.'.InputMode';
			$DenonAVRVar->ptNavigation = "DENON.".$DenonAVRVar->AVRType.".Navigation";
			$DenonAVRVar->ptContrast = "DENON.".$DenonAVRVar->AVRType.".Contrast";
			$DenonAVRVar->ptBrightness = "DENON.".$DenonAVRVar->AVRType.".Brightness";
			$DenonAVRVar->ptChromalevel = "DENON.".$DenonAVRVar->AVRType.".Chromalevel";
			$DenonAVRVar->ptHue = "DENON.".$DenonAVRVar->AVRType.".Hue";
			$DenonAVRVar->ptEnhancer = "DENON.".$DenonAVRVar->AVRType.".Enhancer";
			$DenonAVRVar->ptSubwoofer = "DENON.".$DenonAVRVar->AVRType.".Subwoofer";
			$DenonAVRVar->ptSubwooferATT = "DENON.".$DenonAVRVar->AVRType.".SubwooferATT";
			$DenonAVRVar->ptDNRDirectChange = "DENON.".$DenonAVRVar->AVRType.".DNRDirectChange";
			$DenonAVRVar->ptEffect = "DENON.".$DenonAVRVar->AVRType.".Effect";
			$DenonAVRVar->ptAFDM = "DENON.".$DenonAVRVar->AVRType.".AFDM";
			$DenonAVRVar->ptEffectLevel = "DENON.".$DenonAVRVar->AVRType.".EffectLevel";
			$DenonAVRVar->ptCenterImage = "DENON.".$DenonAVRVar->AVRType.".CenterImage";
			$DenonAVRVar->ptStageWidth = "DENON.".$DenonAVRVar->AVRType.".StageWidth";
			$DenonAVRVar->ptStageHeight = "DENON.".$DenonAVRVar->AVRType.".StageHeight";
			$DenonAVRVar->ptAudysseyDSX = "DENON.".$DenonAVRVar->AVRType.".AudysseyDSX";
			$DenonAVRVar->ptReferenceLevel = "DENON.".$DenonAVRVar->AVRType.".ReferenceLevel";
			$DenonAVRVar->ptDRCDirectChange = "DENON.".$DenonAVRVar->AVRType.".DRCDirectChange";
			$DenonAVRVar->ptSpeakerOutputFront = "DENON.".$DenonAVRVar->AVRType.".SpeakerOutputFront";
			//$DenonAVRVar->ptDCOMPDirectChange = "DENON.".$DenonAVRVar->AVRType.".DCOMPDirectChange";
			$DenonAVRVar->ptHDMIMonitor = "DENON.".$DenonAVRVar->AVRType.".HDMIMonitor";
			$DenonAVRVar->ptASP = "DENON.".$DenonAVRVar->AVRType.".ASP";
			$DenonAVRVar->ptResolution = "DENON.".$DenonAVRVar->AVRType.".Resolution";
			$DenonAVRVar->ptResolutionHDMI = "DENON.".$DenonAVRVar->AVRType.".ResolutionHDMI";
			$DenonAVRVar->ptHDMIAudioOutput = "DENON.".$DenonAVRVar->AVRType.".HDMIAudioOutput";
			$DenonAVRVar->ptVideoProcessingMode = "DENON.".$DenonAVRVar->AVRType.".VideoProcessingMode";
			$DenonAVRVar->ptDolbyVolumeLeveler = "DENON.".$DenonAVRVar->AVRType.".DolbyVolumeLeveler";
			$DenonAVRVar->ptDolbyVolumeModeler = "DENON.".$DenonAVRVar->AVRType.".DolbyVolumeModeler";
			$DenonAVRVar->ptPLIIZHeightGain = "DENON.".$DenonAVRVar->AVRType.".PLIIZHeightGain";
			$DenonAVRVar->ptVerticalStretch = "DENON.".$DenonAVRVar->AVRType.".VerticalStretch";
			$DenonAVRVar->ptDolbyVolume = "DENON.".$DenonAVRVar->AVRType.".DolbyVolume";
			$DenonAVRVar->ptFriendlyName = "DENON.".$DenonAVRVar->AVRType.".FriendlyName";
			$DenonAVRVar->ptMainZoneName = "DENON.".$DenonAVRVar->AVRType.".MainZoneName";
			$DenonAVRVar->ptTopMenuLink = "DENON.".$DenonAVRVar->AVRType.".TopMenuLink";
			$DenonAVRVar->ptModel = "DENON.".$DenonAVRVar->AVRType.".Model";
			$DenonAVRVar->ptGUIMenu = "DENON.".$DenonAVRVar->AVRType.".GUIMenu";
			$DenonAVRVar->ptGUISourceSelect = "DENON.".$DenonAVRVar->AVRType.".GUIMenuSourceSelect";
			$DenonAVRVar->ptSurroundDisplay = "DENON.".$DenonAVRVar->AVRType.".SurroundDisplay";
			$DenonAVRVar->ptDisplay = "DENON.".$DenonAVRVar->AVRType.".Display";
			
			//Zusatz ab AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-X1100W / S700W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-X1100W" || $AVRType == "S700W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$DenonAVRVar->ptGraphicEQ = "DENON.".$DenonAVRVar->AVRType.".GraphicEQ";
				$DenonAVRVar->ptDimmer = "DENON.".$DenonAVRVar->AVRType.".Dimmer";
				$DenonAVRVar->ptDialogLevelAdjust = "DENON.".$DenonAVRVar->AVRType.".DialogLevelAdjust";
				$DenonAVRVar->ptMAINZONEAutoStandbySetting = "DENON.".$DenonAVRVar->AVRType.".MAINZONEAutoStandbySetting";
				$DenonAVRVar->ptMAINZONEECOModeSetting = "DENON.".$DenonAVRVar->AVRType.".MAINZONEECOModeSetting";
			}
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W")
			{
				$DenonAVRVar->ptCenterspread = "DENON.".$DenonAVRVar->AVRType.".Centerspread";
				$DenonAVRVar->ptAuroMatic3DPreset = "DENON.".$DenonAVRVar->AVRType.".AuroMatic3DPreset";
				$DenonAVRVar->ptAuroMatic3DStrength = "DENON.".$DenonAVRVar->AVRType.".AuroMatic3DStrength";
				$DenonAVRVar->ptSurroundHeightLch = "DENON.".$DenonAVRVar->AVRType.".SurroundHeightLch";
				$DenonAVRVar->ptSurroundHeightRch = "DENON.".$DenonAVRVar->AVRType.".SurroundHeightRch";
				$DenonAVRVar->ptTopSurround = "DENON.".$DenonAVRVar->AVRType.".TopSurround";
			}
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W")
			{
				$DenonAVRVar->ptTopFrontLch = "DENON.".$DenonAVRVar->AVRType.".TopFrontLch";
				$DenonAVRVar->ptTopFrontRch = "DENON.".$DenonAVRVar->AVRType.".TopFrontRch";
				$DenonAVRVar->ptTopMiddleLch = "DENON.".$DenonAVRVar->AVRType.".TopMiddleLch";
				$DenonAVRVar->ptTopMiddleRch = "DENON.".$DenonAVRVar->AVRType.".TopMiddleRch";
				$DenonAVRVar->ptTopRearLch = "DENON.".$DenonAVRVar->AVRType.".TopRearLch";
				$DenonAVRVar->ptTopRearRch = "DENON.".$DenonAVRVar->AVRType.".TopRearRch";
				$DenonAVRVar->ptRearHeightLch = "DENON.".$DenonAVRVar->AVRType.".RearHeightLch";
				$DenonAVRVar->ptRearHeightRch = "DENON.".$DenonAVRVar->AVRType.".RearHeightRch";
				$DenonAVRVar->ptFrontDolbyLch = "DENON.".$DenonAVRVar->AVRType.".FrontDolbyLch";
				$DenonAVRVar->ptFrontDolbyRch = "DENON.".$DenonAVRVar->AVRType.".FrontDolbyRch";
				$DenonAVRVar->ptSurroundDolbyLch = "DENON.".$DenonAVRVar->AVRType.".SurroundDolbyLch";
				$DenonAVRVar->ptSurroundDolbyRch = "DENON.".$DenonAVRVar->AVRType.".SurroundDolbyRch";
				$DenonAVRVar->ptBackDolbyLch = "DENON.".$DenonAVRVar->AVRType.".BackDolbyLch";
				$DenonAVRVar->ptBackDolbyRch = "DENON.".$DenonAVRVar->AVRType.".BackDolbyRch";
			}
				
			
			//Variablen
			//Get Inputs
			if (($this->GetIPDenon() !== false) && ($Zone !== 6) && ($AVRType !== 50))
			{
				$this->GetInputsAVR($DenonAVRVar);
				//$this->UpdateInputProfile();
				$this->SetStatus(102);
			}
			else
			{
				$this->InputSources = false;
			}
						
			//String
			$vString = array
				(
				$DenonAVRVar->ptFriendlyName => false,
				$DenonAVRVar->ptMainZoneName => $this->ReadPropertyBoolean('ZoneName'),
				$DenonAVRVar->ptTopMenuLink => false,
				$DenonAVRVar->ptModel => $this->ReadPropertyBoolean('Model'),
				$DenonAVRVar->ptSurroundDisplay => $this->ReadPropertyBoolean('SurroundDisplay'),
				$DenonAVRVar->ptDisplay => $this->ReadPropertyBoolean('Display')				
				);
			
			//Boolean
			$vBoolean = array
				(
				$DenonAVRVar->ptPower => true,
				$DenonAVRVar->ptMainZonePower => true,
				$DenonAVRVar->ptMainMute => true,
				$DenonAVRVar->ptCinemaEQ => $this->ReadPropertyBoolean('CinemaEQ'),
				$DenonAVRVar->ptDynamicEQ => $this->ReadPropertyBoolean('DynamicEQ'),
				$DenonAVRVar->ptFrontHeight => $this->ReadPropertyBoolean('FrontHeight'),
				$DenonAVRVar->ptPanorama => $this->ReadPropertyBoolean('Panorama'),
				$DenonAVRVar->ptToneCTRL => $this->ReadPropertyBoolean('ToneCTRL'),
				$DenonAVRVar->ptVerticalStretch => $this->ReadPropertyBoolean('VerticalStretch'),
				$DenonAVRVar->ptDolbyVolume => $this->ReadPropertyBoolean('DolbyVolume'),
				$DenonAVRVar->ptEffect => $this->ReadPropertyBoolean('Effect'),
				$DenonAVRVar->ptAFDM => $this->ReadPropertyBoolean('AFDM'),
				$DenonAVRVar->ptSubwoofer => $this->ReadPropertyBoolean('Subwoofer'),
				$DenonAVRVar->ptSubwooferATT => $this->ReadPropertyBoolean('SubwooferATT'),
				$DenonAVRVar->ptGUIMenu => $this->ReadPropertyBoolean('GUIMenu'),
				$DenonAVRVar->ptGUISourceSelect => $this->ReadPropertyBoolean('GUIMenuSource'),
				$DenonAVRVar->ptVerticalStretch => $this->ReadPropertyBoolean('VerticalStretch')	
				);
				
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-X1100W" || $AVRType == "S700W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$vBoolean[$DenonAVRVar->ptGraphicEQ] = $this->ReadPropertyBoolean('GraphicEQ');
				$vBoolean[$DenonAVRVar->ptDialogLevelAdjust] = $this->ReadPropertyBoolean('DialogLevelAdjust');
			}		
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W")
			{
				$vBoolean[$DenonAVRVar->ptCenterspread] = $this->ReadPropertyBoolean('Centerspread');
			}

			//Integer
			$vInteger = array
				(
				$DenonAVRVar->ptSleep => $this->ReadPropertyBoolean('Sleep'),
				$DenonAVRVar->ptDimension => $this->ReadPropertyBoolean('Dimension')
				);
			
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W")
			{
				$vInteger[$DenonAVRVar->ptAuroMatic3DStrength] = $this->ReadPropertyBoolean('AuroMatic3DStrength');
			}
			
			//Integer mit Association
			$vIntegerAss = array
				(
				 //$DenonAVRVar->ptInputSource => true,
				 $DenonAVRVar->ptSurroundMode => true,
				 $DenonAVRVar->ptNavigation => $this->ReadPropertyBoolean('Navigation'),
				 $DenonAVRVar->ptQuickSelect => $this->ReadPropertyBoolean('QuickSelect'),
				 $DenonAVRVar->ptDigitalInputMode => $this->ReadPropertyBoolean('DigitalInputMode'),
				 $DenonAVRVar->ptSurroundPlayMode => $this->ReadPropertyBoolean('SurroundPlayMode'),
				 $DenonAVRVar->ptMultiEQMode => $this->ReadPropertyBoolean('MultiEQMode'),
				 $DenonAVRVar->ptAudioRestorer => $this->ReadPropertyBoolean('AudioRestorer'),
				 $DenonAVRVar->ptDynamicVolume => $this->ReadPropertyBoolean('DynamicVolume'),
				 $DenonAVRVar->ptRoomSize => $this->ReadPropertyBoolean('RoomSize'),
				 $DenonAVRVar->ptDynamicCompressor => $this->ReadPropertyBoolean('DynamicCompressor'),
				 $DenonAVRVar->ptDynamicRange => $this->ReadPropertyBoolean('DynamicRange'),
				 $DenonAVRVar->ptVideoSelect => $this->ReadPropertyBoolean('VideoSelect'),
				 $DenonAVRVar->ptSurroundBackMode => $this->ReadPropertyBoolean('SurroundBackMode'),
				 $DenonAVRVar->ptInputMode => $this->ReadPropertyBoolean('InputMode'),
				 $DenonAVRVar->ptHDMIMonitor => $this->ReadPropertyBoolean('HDMIMonitor'),
				 $DenonAVRVar->ptDNRDirectChange => $this->ReadPropertyBoolean('DNRDirectChange'),
				 $DenonAVRVar->ptAudysseyDSX => $this->ReadPropertyBoolean('AudysseyDSX'),
				 $DenonAVRVar->ptReferenceLevel => $this->ReadPropertyBoolean('ReferenceLevel'),
				 $DenonAVRVar->ptDRCDirectChange => $this->ReadPropertyBoolean('DRCDirectChange'),
				 $DenonAVRVar->ptSpeakerOutputFront => $this->ReadPropertyBoolean('SpeakerOutputFront'),
				 $DenonAVRVar->ptASP => $this->ReadPropertyBoolean('ASP'),
				 $DenonAVRVar->ptResolution => $this->ReadPropertyBoolean('Resolution'),
				 $DenonAVRVar->ptResolutionHDMI => $this->ReadPropertyBoolean('ResolutionHDMI'),
				 $DenonAVRVar->ptHDMIAudioOutput => $this->ReadPropertyBoolean('HDMIAudioOutput'),
				 $DenonAVRVar->ptVideoProcessingMode => $this->ReadPropertyBoolean('VideoProcessingMode'),
				 $DenonAVRVar->ptDolbyVolumeLeveler => $this->ReadPropertyBoolean('DolbyVolumeLeveler'),
				 $DenonAVRVar->ptDolbyVolumeModeler => $this->ReadPropertyBoolean('DolbyVolumeModeler'),
				 $DenonAVRVar->ptPLIIZHeightGain => $this->ReadPropertyBoolean('PLIIZHeightGain')		
				);
				
				
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W")
			{
				$vIntegerAss[$DenonAVRVar->ptAuroMatic3DPreset] = $this->ReadPropertyBoolean('AuroMatic3DPreset');		
			}
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-X1100W" || $AVRType == "S700W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$vIntegerAss[$DenonAVRVar->ptMAINZONEAutoStandbySetting] = $this->ReadPropertyBoolean('MAINZONEAutoStandbySetting');
				$vIntegerAss[$DenonAVRVar->ptMAINZONEECOModeSetting] = $this->ReadPropertyBoolean('MAINZONEECOModeSetting');
				$vIntegerAss[$DenonAVRVar->ptDimmer] = $this->ReadPropertyBoolean('Dimmer');	
			}

			//Float
			$vFloat = array
				(
				//Lautsprecher
				$DenonAVRVar->ptMasterVolume => true,
				$DenonAVRVar->ptChannelVolumeFL => $this->ReadPropertyBoolean('FL'),
				$DenonAVRVar->ptChannelVolumeFR => $this->ReadPropertyBoolean('FR'),
				$DenonAVRVar->ptChannelVolumeC => $this->ReadPropertyBoolean('C'),
				$DenonAVRVar->ptChannelVolumeSW => $this->ReadPropertyBoolean('SW'),
				$DenonAVRVar->ptChannelVolumeSW2 => $this->ReadPropertyBoolean('SW2'),
				$DenonAVRVar->ptChannelVolumeSL => $this->ReadPropertyBoolean('SL'),
				$DenonAVRVar->ptChannelVolumeSR => $this->ReadPropertyBoolean('SR'),
				$DenonAVRVar->ptChannelVolumeSBL => $this->ReadPropertyBoolean('SBL'),
				$DenonAVRVar->ptChannelVolumeSBR => $this->ReadPropertyBoolean('SBR'),
				$DenonAVRVar->ptChannelVolumeSB => $this->ReadPropertyBoolean('SB'),
				$DenonAVRVar->ptChannelVolumeFHL => $this->ReadPropertyBoolean('FHL'),
				$DenonAVRVar->ptChannelVolumeFHR => $this->ReadPropertyBoolean('FHR'),
				$DenonAVRVar->ptChannelVolumeFWL => $this->ReadPropertyBoolean('FWL'),
				$DenonAVRVar->ptChannelVolumeFWR => $this->ReadPropertyBoolean('FWR'),
				$DenonAVRVar->ptAudioDelay => $this->ReadPropertyBoolean('AudioDelay'),
				$DenonAVRVar->ptLFELevel => $this->ReadPropertyBoolean('LFELevel'),
				$DenonAVRVar->ptBassLevel => $this->ReadPropertyBoolean('BassLevel'),
				$DenonAVRVar->ptTrebleLevel => $this->ReadPropertyBoolean('TrebleLevel'),
				$DenonAVRVar->ptCenterWidth => $this->ReadPropertyBoolean('CenterWidth'),
				$DenonAVRVar->ptEffectLevel => $this->ReadPropertyBoolean('EffectLevel'),
				$DenonAVRVar->ptCenterImage => $this->ReadPropertyBoolean('CenterImage'),
				$DenonAVRVar->ptContrast => $this->ReadPropertyBoolean('Contrast'),
				$DenonAVRVar->ptBrightness => $this->ReadPropertyBoolean('Brightness'),
				$DenonAVRVar->ptChromalevel => $this->ReadPropertyBoolean('Chromalevel'),
				$DenonAVRVar->ptHue => $this->ReadPropertyBoolean('Hue'),
				$DenonAVRVar->ptEnhancer => $this->ReadPropertyBoolean('Enhancer'),
				$DenonAVRVar->ptStageHeight => $this->ReadPropertyBoolean('StageHeight'),
				$DenonAVRVar->ptStageWidth => $this->ReadPropertyBoolean('StageWidth')
				);
			
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W")
			{
				$vFloat[$DenonAVRVar->ptSurroundHeightLch] = $this->ReadPropertyBoolean('SurroundHeightLch');
				$vFloat[$DenonAVRVar->ptSurroundHeightRch] = $this->ReadPropertyBoolean('SurroundHeightRch');
				$vFloat[$DenonAVRVar->ptTopSurround] = $this->ReadPropertyBoolean('TopSurround');		
			}
			
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W")
			{
				$vFloat[$DenonAVRVar->ptTopFrontLch] = $this->ReadPropertyBoolean('TopFrontLch');
				$vFloat[$DenonAVRVar->ptTopFrontRch] = $this->ReadPropertyBoolean('TopFrontRch');
				$vFloat[$DenonAVRVar->ptTopMiddleLch] = $this->ReadPropertyBoolean('ptTopMiddleLch');
				$vFloat[$DenonAVRVar->ptTopMiddleRch] = $this->ReadPropertyBoolean('TopMiddleRch');
				$vFloat[$DenonAVRVar->ptTopRearLch] = $this->ReadPropertyBoolean('TopRearLch');
				$vFloat[$DenonAVRVar->ptTopRearRch] = $this->ReadPropertyBoolean('TopRearRch');
				$vFloat[$DenonAVRVar->ptRearHeightLch] = $this->ReadPropertyBoolean('RearHeightLch');
				$vFloat[$DenonAVRVar->ptRearHeightRch] = $this->ReadPropertyBoolean('RearHeightRch');
				$vFloat[$DenonAVRVar->ptFrontDolbyLch] = $this->ReadPropertyBoolean('FrontDolbyLch');
				$vFloat[$DenonAVRVar->ptFrontDolbyRch] = $this->ReadPropertyBoolean('FrontDolbyRch');
				$vFloat[$DenonAVRVar->ptSurroundDolbyLch] = $this->ReadPropertyBoolean('SurroundDolbyLch');
				$vFloat[$DenonAVRVar->ptSurroundDolbyRch] = $this->ReadPropertyBoolean('SurroundDolbyRch');
				$vFloat[$DenonAVRVar->ptBackDolbyLch] = $this->ReadPropertyBoolean('BackDolbyLch]');
				$vFloat[$DenonAVRVar->ptBackDolbyRch] = $this->ReadPropertyBoolean('BackDolbyRch');
			}	
			$this->SetupVarDenon($DenonAVRVar, $vBoolean, $vInteger, $vIntegerAss, $vFloat, $vString);		
		}
		elseif (($Zone == 1) && ($AVRType !== 50)) //Zone 2
		{
			//Profilnamen anlegen
			$DenonAVRVar = new DENONIPSProfiles;
			$AVRType = $this->GetAVRType();
			//AVRType und Zone
			$DenonAVRVar->AVRType = $AVRType;
			$DenonAVRVar->Zone = $this->ReadPropertyInteger('Zone');
			$DenonAVRVar->ptPower = 'DENON.'.$DenonAVRVar->AVRType.'.Power';
			$DenonAVRVar->ptZone2Power = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2Power';
			$DenonAVRVar->ptZone2Mute = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2Mute';
			$DenonAVRVar->ptZone2Volume = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2Volume';
			$DenonAVRVar->ptZone2InputSource = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2InputSource';
			$DenonAVRVar->ptZone2ChannelSetting = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2ChannelSetting';
			$DenonAVRVar->ptZone2ChannelVolumeFL = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2ChannelVolumeFL';
			$DenonAVRVar->ptZone2ChannelVolumeFR = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2ChannelVolumeFR';
			$DenonAVRVar->ptZone2QuickSelect = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2QuickSelect';
			$DenonAVRVar->ptZone2Name = "DENON.".$DenonAVRVar->AVRType.".Zone2Name";
			$DenonAVRVar->ptZone2Sleep = 'DENON.'.$DenonAVRVar->AVRType.'.Zone2Sleep';
			$DenonAVRVar->ptTopMenuLink = "DENON.".$DenonAVRVar->AVRType.".TopMenuLink";
			$DenonAVRVar->ptModel = "DENON.".$DenonAVRVar->AVRType.".Model";
			$DenonAVRVar->ptNavigation = "DENON.".$DenonAVRVar->AVRType.".Navigation";
			$DenonAVRVar->ptSurroundMode = 'DENON.'.$DenonAVRVar->AVRType.'.SurroundMode';
			//Zusatz ab AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$DenonAVRVar->ptZONE2AutoStandbySetting = "DENON.".$DenonAVRVar->AVRType.".ZONE2AutoStandbySetting";
			}
			
			
			//Variablen
			if (($this->GetIPDenon() !== false) && ($Zone !== 6) && ($AVRType !== 50))
			{
				$this->GetInputsAVR($DenonAVRVar);
				//$this->UpdateInputProfile();
				$this->SetStatus(102);
			}
			else
			{
				$this->InputSources = false;
			}	
			
			//String
			$vString = array
				(
				$DenonAVRVar->ptZone2Name => $this->ReadPropertyBoolean('ZoneName'),
				//$DenonAVRVar->ptTopMenuLink => false,
				$DenonAVRVar->ptModel => $this->ReadPropertyBoolean('Model')
				);
			
			//Boolean
			$vBoolean = array
				(
				$DenonAVRVar->ptPower => true,
				$DenonAVRVar->ptZone2Power => true,
				$DenonAVRVar->ptZone2Mute => true,
				$DenonAVRVar->ptZone2HPF => $this->ReadPropertyBoolean('Z2HPF')
				);
				
			//Integer
			$vInteger = array
				(
				$DenonAVRVar->ptZone2Sleep => $this->ReadPropertyBoolean('Z2Sleep')
				);
			
			//Integer mit Association
			$vIntegerAss = array
				(
				 $DenonAVRVar->ptNavigation => $this->ReadPropertyBoolean('Navigation'),
				 $DenonAVRVar->ptZone2InputSource => true,
				 $DenonAVRVar->ptZone2ChannelSetting => $this->ReadPropertyBoolean('Z2Channel'),
				 $DenonAVRVar->ptZone2QuickSelect => $this->ReadPropertyBoolean('Z2Quick')
				);
				
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-X1100W" || $AVRType == "S700W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$vIntegerAss[$DenonAVRVar->ptZONE2AutoStandbySetting] = $this->ReadPropertyBoolean('ZONE2AutoStandbySetting');
			}	
				
			//Float
			$vFloat = array
				(
				//Lautsprecher
				$DenonAVRVar->ptZone2Volume => true,
				$DenonAVRVar->ptZone2ChannelVolumeFL => $this->ReadPropertyBoolean('Z2CVFL'),
				$DenonAVRVar->ptZone2ChannelVolumeFR => $this->ReadPropertyBoolean('Z2CVFR')
				);
			
			$this->SetupVarDenon($DenonAVRVar, $vBoolean, $vInteger, $vIntegerAss, $vFloat, $vString);
		}
		elseif (($Zone == 2) && ($AVRType !== 50)) // Zone 3
		{
			//Profilnamen anlegen
			$DenonAVRVar = new DENONIPSProfiles;
			$AVRType = $this->GetAVRType();
			//AVRType und Zone
			$DenonAVRVar->AVRType = $AVRType;
			$DenonAVRVar->Zone = $this->ReadPropertyInteger('Zone');
			$DenonAVRVar->ptPower = 'DENON.'.$DenonAVRVar->AVRType.'.Power';
			$DenonAVRVar->ptZone3Power = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3Power';
			$DenonAVRVar->ptZone3Mute = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3Mute';
			$DenonAVRVar->ptZone3Volume = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3Volume';
			$DenonAVRVar->ptZone3InputSource = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3InputSource';
			$DenonAVRVar->ptZone3ChannelSetting = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3ChannelSetting';
			$DenonAVRVar->ptZone3ChannelVolumeFL = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3ChannelVolumeFL';
			$DenonAVRVar->ptZone3ChannelVolumeFR = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3ChannelVolumeFR';
			$DenonAVRVar->ptZone3QuickSelect = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3QuickSelect';
			$DenonAVRVar->ptZone3Name = "DENON.".$DenonAVRVar->AVRType.".Zone3Name";
			$DenonAVRVar->ptZone3Sleep = 'DENON.'.$DenonAVRVar->AVRType.'.Zone3Sleep';
			$DenonAVRVar->ptTopMenuLink = "DENON.".$DenonAVRVar->AVRType.".TopMenuLink";
			$DenonAVRVar->ptModel = "DENON.".$DenonAVRVar->AVRType.".Model";
			$DenonAVRVar->ptNavigation = "DENON.".$DenonAVRVar->AVRType.".Navigation";
			$DenonAVRVar->ptSurroundMode = 'DENON.'.$DenonAVRVar->AVRType.'.SurroundMode';
			//Zusatz ab AVR-X7200W / AVR-X5200W / AVR-X4100W / AVR-X3100W /	AVR-X2100W / S900W / AVR-7200WA / AVR-6200W / AVR-4200W / AVR-3200W / AVR-2200W / AVR-1200W
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$DenonAVRVar->ptZONE3AutoStandbySetting = "DENON.".$DenonAVRVar->AVRType.".ZONE3AutoStandbySetting";
			}
			
			//Variablen
			if (($this->GetIPDenon() !== false) && ($Zone !== 6) && ($AVRType !== 50))
			{
				$this->GetInputsAVR($DenonAVRVar);
				//$this->UpdateInputProfile();
				$this->SetStatus(102);
			}
			else
			{
				$this->InputSources = false;
			}		
	
			//String
			$vString = array
				(
				$DenonAVRVar->ptZone3Name => $this->ReadPropertyBoolean('ZoneName'),
				//$DenonAVRVar->ptTopMenuLink => false,
				$DenonAVRVar->ptModel => $this->ReadPropertyBoolean('Model')
				);
			
			//Boolean
			$vBoolean = array
				(
				$DenonAVRVar->ptPower => true,
				$DenonAVRVar->ptZone3Power => true,
				$DenonAVRVar->ptZone3Mute => true,
				$DenonAVRVar->ptZone3HPF => $this->ReadPropertyBoolean('Z3HPF')
				);
				
			//Integer
			$vInteger = array
				(
				$DenonAVRVar->ptZone3Sleep => $this->ReadPropertyBoolean('Z3Sleep')
				);
			
			//Integer mit Association
			$vIntegerAss = array
				(
				 $DenonAVRVar->ptNavigation => $this->ReadPropertyBoolean('Navigation'),
				 $DenonAVRVar->ptZone3InputSource => true,
				 $DenonAVRVar->ptZone3ChannelSetting => $this->ReadPropertyBoolean('Z3Channel'),
				 $DenonAVRVar->ptZone3QuickSelect => $this->ReadPropertyBoolean('Z3Quick')
				);
			
			if ($AVRType == "AVR-X7200W" || $AVRType == "AVR-X5200W" || $AVRType == "AVR-X4100W" || $AVRType == "AVR-X3100W" || $AVRType == "AVR-X2100W" || $AVRType == "S900W" || $AVRType == "AVR-X1100W" || $AVRType == "S700W" || $AVRType == "AVR-7200WA"  || $AVRType == "AVR-6200W" || $AVRType == "AVR-4200W" || $AVRType == "AVR-3200W" || $AVRType == "AVR-2200W" || $AVRType == "AVR-1200W")
			{
				$vIntegerAss[$DenonAVRVar->ptZONE3AutoStandbySetting] = $this->ReadPropertyBoolean('ZONE3AutoStandbySetting');
			}	
			
			//Float
			$vFloat = array
				(
				//Lautsprecher
				$DenonAVRVar->ptZone3Volume => true,
				$DenonAVRVar->ptZone3ChannelVolumeFL => $this->ReadPropertyBoolean('Z3CVFL'),
				$DenonAVRVar->ptZone3ChannelVolumeFR => $this->ReadPropertyBoolean('Z3CVFR')
				);
			
			$this->SetupVarDenon($DenonAVRVar, $vBoolean, $vInteger, $vIntegerAss, $vFloat, $vString);
		}
		
		
		
		
		//TestEmpfangspuffer
		/*
		$responseid = @IPS_GetVariableIDByName("Response", $this->InstanceID);
				if ($responseid === false)
					{
						//Response
						$responseid = $this->RegisterVariableString("Response", "Response", "~String", 1);
						//IPS_SetHidden($responseid, true);
						$this->EnableAction("Response");
					
					}
				else
					{
						//Variable Response existiert bereits
						
					}
		*/	

			// Deaktiviert die Standardaktion der Statusvariablen
		if($this->ReadPropertyBoolean('ZoneName'))
			{
				if($this->ReadPropertyBoolean('Zone') == 0)
					{
						$this->DisableAction("MainZoneName");
						if($this->ReadPropertyBoolean('SurroundDisplay') == true)
						{
							$this->DisableAction("SurroundDisplay");
						}
						if($this->ReadPropertyBoolean('Display') == true)
						{
							$this->DisableAction("Display");
						}
					}
			
				if($this->ReadPropertyBoolean('Zone') == 1)
					{
						$this->DisableAction("Zone2Name");
					}
				
				if($this->ReadPropertyBoolean('Zone') == 2)
					{
						$this->DisableAction("Zone3Name");
					}
				
			}
		if ($this->ReadPropertyBoolean('Zone') !== 6)
			{
				if($this->ReadPropertyBoolean('Model'))
				{
					$this->DisableAction("Model");
				}
			}
			
			
			
			//auf aktive Parent pr�fen
				
			//Status aktiv
			//$this->SetStatus(102);
	}
	
	private function GetInputsAVR($DenonAVRVar)
	{
		$DenonAVRVar->DenonIP = $this->GetIPDenon();
		$FAVORITES = $this->ReadPropertyBoolean('FAVORITES');
		$IRADIO = $this->ReadPropertyBoolean('IRADIO');
		$SERVER = $this->ReadPropertyBoolean('SERVER');
		$NAPSTER = $this->ReadPropertyBoolean('NAPSTER');
		$LASTFM = $this->ReadPropertyBoolean('LASTFM');
		$FLICKR = $this->ReadPropertyBoolean('FLICKR');
		$this->InputSources = $DenonAVRVar->GetInputSources($this->ReadPropertyInteger('Zone'), $DenonAVRVar->AVRType, $FAVORITES, $IRADIO, $SERVER, $NAPSTER, $LASTFM, $FLICKR);
		$this->VarMappingInputs = $DenonAVRVar->GetInputVarmapping($this->ReadPropertyInteger("Zone"));
		$Inputs = $this->VarMappingInputs;
		//Input ablegen
		$MappingInputs = json_encode($Inputs);
		DAVRST_SaveInputVarmapping($this->GetParent(), $MappingInputs);
	}
	
	private function GetZone()
    {
        $this->DenonZone = new DENON_Zone();
        $this->DenonZone->thisZone = $this->ReadPropertyInteger("Zone");
        return true;
    }
	
	public function GetInputSources()
	{
		$DenonAVRUpdate = new DENONIPSProfiles;
		$DenonAVRUpdate->Zone = $this->ReadPropertyInteger('Zone');
		$DenonAVRUpdate->DenonIP = $this->GetIPDenon();
		$DenonAVRUpdate->AVRType = $this->GetAVRType();
		$DenonAVRUpdate->ptInputSource = 'DENON.'.$DenonAVRUpdate->AVRType.'.Inputsource';
		$DenonAVRUpdate->ptZone2InputSource = 'DENON.'.$DenonAVRUpdate->AVRType.'.Zone2InputSource';
		$DenonAVRUpdate->ptZone3InputSource = 'DENON.'.$DenonAVRUpdate->AVRType.'.Zone3InputSource';
		$FAVORITES = $this->ReadPropertyBoolean('FAVORITES');
		$IRADIO = $this->ReadPropertyBoolean('IRADIO');
		$SERVER = $this->ReadPropertyBoolean('SERVER');
		$NAPSTER = $this->ReadPropertyBoolean('NAPSTER');
		$LASTFM = $this->ReadPropertyBoolean('LASTFM');
		$FLICKR = $this->ReadPropertyBoolean('FLICKR');
		$InputSources = $DenonAVRUpdate->GetInputSources($this->ReadPropertyInteger('Zone'), $DenonAVRUpdate->AVRType, $FAVORITES, $IRADIO, $SERVER, $NAPSTER, $LASTFM, $FLICKR);
		return $InputSources;
	}
	
	public function UpdateInputProfile()
	{
		$DenonAVRUpdate = new DENONIPSProfiles;
		$DenonAVRUpdate->Zone = $this->ReadPropertyInteger('Zone');
		$DenonAVRUpdate->DenonIP = $this->GetIPDenon();
		$DenonAVRUpdate->AVRType = $this->GetAVRType();
		$DenonAVRUpdate->ptInputSource = 'DENON.'.$DenonAVRUpdate->AVRType.'.Inputsource';
		$DenonAVRUpdate->ptZone2InputSource = 'DENON.'.$DenonAVRUpdate->AVRType.'.Zone2InputSource';
		$DenonAVRUpdate->ptZone3InputSource = 'DENON.'.$DenonAVRUpdate->AVRType.'.Zone3InputSource';
		$FAVORITES = $this->ReadPropertyBoolean('FAVORITES');
		$IRADIO = $this->ReadPropertyBoolean('IRADIO');
		$SERVER = $this->ReadPropertyBoolean('SERVER');
		$NAPSTER = $this->ReadPropertyBoolean('NAPSTER');
		$LASTFM = $this->ReadPropertyBoolean('LASTFM');
		$FLICKR = $this->ReadPropertyBoolean('FLICKR');
		$this->InputSources = $DenonAVRUpdate->GetInputSources($this->ReadPropertyInteger('Zone'), $DenonAVRUpdate->AVRType, $FAVORITES, $IRADIO, $SERVER, $NAPSTER, $LASTFM, $FLICKR);
		
		//Inputs anlegen
		if($this->InputSources !== false)
		{
			if($DenonAVRUpdate->Zone == 0)
			{
				$inputsourcesprofile = $DenonAVRUpdate->SetupVarDenonIntegerAss($DenonAVRUpdate->ptInputSource, $DenonAVRUpdate->AVRType);
			}
			elseif($DenonAVRUpdate->Zone == 1)
			{
				$inputsourcesprofile = $DenonAVRUpdate->SetupVarDenonIntegerAss($DenonAVRUpdate->ptZone2InputSource, $DenonAVRUpdate->AVRType);
			}
			elseif($DenonAVRUpdate->Zone == 2)
			{
				$inputsourcesprofile = $DenonAVRUpdate->SetupVarDenonIntegerAss($DenonAVRUpdate->ptZone3InputSource, $DenonAVRUpdate->AVRType);
			}
			
			$this->WriteUpdateProfileInputs($inputsourcesprofile["ProfilName"], $inputsourcesprofile["Icon"], $inputsourcesprofile["Prefix"], $inputsourcesprofile["Suffix"], $inputsourcesprofile["MinValue"], $inputsourcesprofile["MaxValue"], $inputsourcesprofile["Stepsize"], $inputsourcesprofile["Digits"], $inputsourcesprofile["Associations"]);
			IPS_LogMessage('Denon Telnet AVR','Variablenprofil Update:'. $inputsourcesprofile["ProfilName"]);
			if($DenonAVRUpdate->Zone == 0)
				{
					IPS_SetVariableCustomProfile($this->GetIDForIdent("SI"), $DenonAVRUpdate->ptInputSource);
				}
			//Zone 2 und 3 haben kein SI	
			elseif($DenonAVRUpdate->Zone == 1)
				{
					IPS_SetVariableCustomProfile($this->GetIDForIdent("Z2INPUT"), $DenonAVRUpdate->ptZone2InputSource);
				}
			elseif($DenonAVRUpdate->Zone == 3)
				{
					IPS_SetVariableCustomProfile($this->GetIDForIdent("Z3INPUT"), $DenonAVRUpdate->ptZone3InputSource);
				}	
			
			
		}
		
		//Input ablegen
		$this->VarMappingInputs = $DenonAVRUpdate->GetInputVarmapping($this->ReadPropertyInteger("Zone"));
		$MappingInputs = json_encode($this->VarMappingInputs);
		DAVRST_SaveInputVarmapping($this->GetParent(), $MappingInputs);
		$Inputs = array( "Inputprofile" => $this->InputSources, "Varmapping" => $MappingInputs);
		return $Inputs;
	}
	
	private function GetAVRType()
	{
		$TypeInt = $this->ReadPropertyInteger('AVRType');
		
		$Types = array(
				0 => "AVR-2313",
				1 => "AVR-3312",
				2 => "AVR-3313",
				3 => "AVR-3808A",
				4 => "AVR-4308A",
				5 => "AVR-4310",
				6 => "AVR-4311",
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
				17 => "AVR-X4100W",
				18 => "AVR-X4200W",
				19 => "AVR-X5200W",
				20 => "AVR-X6200W",
				21 => "AVR-X7200W",
				22 => "AVR-X7200WA",
				23 => "Marantz-NR1605",
				24 => "S-700W",
				25 => "S-900W",
				26 => "AVR-1912");
		
		/*AVR-1311,AVR-1312,AVR-1507,AVR-1508,AVR-1509,AVR-1513,AVR-1610,AVR-1611,AVR-1705,AVR-1706,AVR-1707,AVR-1708,
		AVR-1713,AVR-1905,AVR-1906,AVR-1907,AVR-1908,AVR-1909,AVR-1910,AVR-1911, AVR-2105,AVR-2106,AVR-2113,
		AVR-2307,AVR-2308,AVR-2309,AVR-2310,AVR-2311,AVR-2312,AVR-2313,AVR-2805,AVR-2807,AVR-2808,AVR-2809,AVR-3310,
		AVR-3311,AVR-3312,AVR-3313,AVR-3805,AVR-3806,AVR-3808A,AVR-4306,AVR-4308A,AVR-4310,AVR-4311,AVR-4520,AVR-4810,
		AVR-A100,AVR-X1000,AVR-X1100W,AVR-X2000,AVR-X2100W,AVR-X3000,AVR-X3100W,AVR-X4000,AVR-X4100W,AVR-X500,AVR-X7200W,
		AVR-X7200WA,AVR-X6200W,AVR-X5200W,AVR-X4200W,AVR-X3200W,AVR-X2200W,AVR-X1200W*/
		
		
		foreach($Types as $TypeID => $AVRType)
		{
			if($TypeID == $TypeInt)
			{
			   return $AVRType;
			}

		}		
	}
	
	private function SetupVarDenon($DenonAVRVar, $vBoolean, $vInteger, $vIntegerAss, $vFloat, $vString)
	{
		$AVRType = $this->GetAVRType();
		// Add/Remove according to feature activation
        // create link list for deletion of links if target is deleted
        $links = Array();
        foreach( IPS_GetLinkList() as $key=>$LinkID ){
            $links[] =  Array( ('LinkID') => $LinkID, ('TargetID') =>  IPS_GetLink($LinkID)['TargetID'] );
        }
		
		//Inputs anlegen
		if($this->InputSources !== false)
		{
			if($DenonAVRVar->Zone == 0)
			{
				$inputsourcesprofile = $DenonAVRVar->SetupVarDenonIntegerAss($DenonAVRVar->ptInputSource, $AVRType);
			}
			elseif($DenonAVRVar->Zone == 1)
			{
				$inputsourcesprofile = $DenonAVRVar->SetupVarDenonIntegerAss($DenonAVRVar->ptZone2InputSource, $AVRType);
			}
			elseif($DenonAVRVar->Zone == 2)
			{
				$inputsourcesprofile = $DenonAVRVar->SetupVarDenonIntegerAss($DenonAVRVar->ptZone3InputSource, $AVRType);
			}
			
			$this->RegisterProfileIntegerDenonAss($inputsourcesprofile["ProfilName"], $inputsourcesprofile["Icon"], $inputsourcesprofile["Prefix"], $inputsourcesprofile["Suffix"], $inputsourcesprofile["MinValue"], $inputsourcesprofile["MaxValue"], $inputsourcesprofile["Stepsize"], $inputsourcesprofile["Digits"], $inputsourcesprofile["Associations"]);
			IPS_LogMessage('Denon Telnet AVR','Variablenprofil angelegt:'. $inputsourcesprofile["ProfilName"]);
			$id = $this->RegisterVariableInteger($inputsourcesprofile["Ident"], $inputsourcesprofile["Name"], $inputsourcesprofile["ProfilName"], $inputsourcesprofile["Position"]);
			IPS_LogMessage('Denon Telnet AVR','Variable angelegt:'. $inputsourcesprofile["Name"].', [ObjektID: '.$id.']');
			$this->EnableAction($inputsourcesprofile["Ident"]);
		}	
		
		
		//Sichtbare Variablen anlegen
		foreach ($vString as $ptString => $visible)
		{
		//Auswahl Pr�fen
		if ($visible === true)
			{
				$profile = $DenonAVRVar->SetupVarDenonString($ptString, $AVRType);
				//Ident, Name, Profile, Position, Icon
				if ($profile["ProfilName"] !== "~HTMLBox")
					{
						$this->RegisterProfileStringDenon($profile["ProfilName"], $profile["Icon"]);
					}
				$id = $this->RegisterVariableString ($profile["Ident"], $profile["Name"], $profile["ProfilName"], $profile["Position"]);
				if ($profile["Ident"] == "Display")
					{
						$DisplayHTML = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd"><html><body><div id="NSARow0"></div><div id="NSARow1"></div><div id="NSARow2"></div><div id="NSARow3"></div><div id="NSARow4"></div><div id="NSARow5"></div><div id="NSARow6"></div><div id="NSARow7"></div><div id="NSARow8"></div></body></html>';
						SetValueString($this->GetIDForIdent("Display"), $DisplayHTML);
					}
				IPS_LogMessage('Denon Telnet AVR','Variable angelegt:'. $profile["Name"].', [ObjektID: '.$id.']');
				$this->EnableAction($profile["Ident"]);
			}	
		// wenn nicht sichtbar l�schen
		elseif ($visible === false)
			{
				 $profile = $DenonAVRVar->SetupVarDenonString($ptString, $AVRType);
				 $this->removeVariableAction($profile["Ident"], $links, $ptString); 
			}
		}
		
		foreach ($vBoolean as $ptBool => $visible)
		{
		//Auswahl Pr�fen
		if ($visible === true)
			{
				$profile = $DenonAVRVar->SetupVarDenonBool($ptBool, $AVRType);
				//Ident, Name, Profile, Position 
				$id = $this->RegisterVariableBoolean($profile["Ident"], $profile["Name"], $profile["ProfilName"], $profile["Position"]);
				IPS_LogMessage('Denon Telnet AVR','Variable angelegt:'. $profile["Name"].', [ObjektID: '.$id.']');
				$this->EnableAction($profile["Ident"]);
				//NEO Toggle Skript anlegen
				if ($this->ReadPropertyBoolean('NEOToggle'))
				{
					$this->NEOToggle($id);
				}
			}	
		// wenn nicht sichtbar l�schen
		elseif ($visible === false)
			{
				 $profile = $DenonAVRVar->SetupVarDenonBool($ptBool, $AVRType);
				 $this->removeVariableAction($profile["Ident"], $links, $ptBool); 
			}
		}
		
		foreach ($vInteger as $ptInteger => $visible)
		{
		//Auswahl Pr�fen
		if ($visible === true)
			{
				$profile = $DenonAVRVar->SetupVarDenonInteger($ptInteger, $AVRType);
				$this->RegisterProfileIntegerDenon($profile["ProfilName"], $profile["Icon"], $profile["Prefix"], $profile["Suffix"], $profile["MinValue"], $profile["MaxValue"], $profile["Stepsize"], $profile["Digits"]);
				IPS_LogMessage('Denon Telnet AVR','Variablenprofil angelegt:'.$profile["ProfilName"]);	
				$id = $this->RegisterVariableInteger($profile["Ident"], $profile["Name"], $profile["ProfilName"], $profile["Position"]);
				IPS_LogMessage('Denon Telnet AVR','Variable angelegt:'. $profile["Name"].', [ObjektID: '.$id.']');
				$this->EnableAction($profile["Ident"]);
			}	
		// wenn nicht sichtbar l�schen
		elseif ($visible === false)
			{
				$profile = $DenonAVRVar->SetupVarDenonInteger($ptInteger, $AVRType);
				$this->removeVariableAction($profile["Ident"], $links, $ptInteger); 
			}
		}
		
		foreach ($vIntegerAss as $ptIntegerAss => $visible)
		{
		//Auswahl Pr�fen
		if ($visible === true)
			{
				$profile = $DenonAVRVar->SetupVarDenonIntegerAss($ptIntegerAss, $AVRType);
				$this->RegisterProfileIntegerDenonAss($profile["ProfilName"], $profile["Icon"], $profile["Prefix"], $profile["Suffix"], $profile["MinValue"], $profile["MaxValue"], $profile["Stepsize"], $profile["Digits"], $profile["Associations"]);
				IPS_LogMessage('Denon Telnet AVR','Variablenprofil angelegt:'.$profile["ProfilName"]);
				$id = $this->RegisterVariableInteger($profile["Ident"], $profile["Name"], $profile["ProfilName"], $profile["Position"]);
				IPS_LogMessage('Denon Telnet AVR','Variable angelegt:'.$profile["Name"].', [ObjektID: '.$id.']');
				$this->EnableAction($profile["Ident"]);
				
			}	
		// wenn nicht sichtbar l�schen
		elseif ($visible === false)
			{
				$profile = $DenonAVRVar->SetupVarDenonIntegerAss($ptIntegerAss, $AVRType);
				$this->removeVariableAction($profile["Ident"], $links, $ptIntegerAss); 
			}
		}
		
		foreach ($vFloat as $ptFloat => $visible)
		{
		//Auswahl Pr�fen
		if ($visible === true)
			{
				$profile = $DenonAVRVar->SetupVarDenonFloat($ptFloat, $AVRType);
				$this->RegisterProfileFloatDenon($profile["ProfilName"], $profile["Icon"], $profile["Prefix"], $profile["Suffix"], $profile["MinValue"], $profile["MaxValue"], $profile["Stepsize"], $profile["Digits"]);
				IPS_LogMessage('Denon Telnet AVR','Variablenprofil angelegt:'.$profile["ProfilName"]);
				$id = $this->RegisterVariableFloat($profile["Ident"], $profile["Name"], $profile["ProfilName"], $profile["Position"]);
				IPS_LogMessage('Denon Telnet AVR','Variable angelegt:'.$profile["Name"].', [ObjektID: '.$id.']');
				$this->EnableAction($profile["Ident"]);
			}
		// wenn nicht sichtbar l�schen
		elseif ($visible === false)
			{
				$profile = $DenonAVRVar->SetupVarDenonFloat($ptFloat, $AVRType);
				$this->removeVariableAction($profile["Ident"], $links, $ptFloat); 
			}
		}
		
	}
	
	protected function SetupDisplay($AVRType)
	{	
		$this->RegisterVariableString("Display", "Display", "~HTMLBox", 32);
		//$this->EnableAction("Display");
		// Status aktiv
		//$this->SetStatus(102);
	}
	
	protected function removeVariableAction($Ident, $links, $Profile)
	{
        $vid = @$this->GetIDForIdent($Ident);
        if ($vid !== false)
		{
            $Name = IPS_GetName ($vid);
			// delete links to Variable
            foreach( $links as $key=>$value ){
                if ( $value['TargetID'] === $vid )
                     IPS_DeleteLink($value['LinkID']);
            }
            $this->DisableAction($Ident);
            $this->UnregisterVariable($Ident);
			IPS_LogMessage('Denon Telnet AVR','Variable gel�scht: '.$Name.', [ObjektID: '.$vid.']');
			//delete Profile
			if (IPS_VariableProfileExists ($Profile))
			{
				IPS_DeleteVariableProfile($Profile);
				IPS_LogMessage('Denon Telnet AVR','Variablenprofil gel�scht:'.$Profile);
			}
			
        }
    }
		
	
	public function GetStates()
	{
		if (IPS_HasChildren($this->InstanceID))
		{
		$AVRVarIDs = IPS_GetChildrenIDs ($this->InstanceID);
		
		//Array Ident erzeugen
		$AVRCommands = array_flip($AVRVarIDs);
		
		//Hidden nicht abfragen
		foreach ($AVRCommands as $ObjektID => $id)
		{
		$ObjektIDInfo = IPS_GetObject($ObjektID);
		$Name = $ObjektIDInfo["ObjectName"];
		$hidden = $ObjektIDInfo["ObjectIsHidden"];
			if ($hidden)
			{
			unset($AVRCommands[$ObjektID]);
			}
		$Ident = $ObjektIDInfo["ObjectIdent"];
		if($Ident == "MN" || $Ident == "Display" || $Ident == "MainZoneName" || $Ident == "Model" || $Ident == "SurroundDisplay")
			{
			unset($AVRCommands[$ObjektID]);
			}
		if($Ident !== "MN" && $Ident !== "Display" && $Ident !=="MainZoneName" && $Ident !=="Model" && $Ident !=="SurroundDisplay")
			{
			$AVRCommands[$ObjektID] = $Ident;
			}

		}
		
		//$timestamp = time();
		foreach ($AVRCommands as $ObjektID => $Ident)
			{
				$Name = IPS_GetName($ObjektID);
				IPS_LogMessage('Denon Telnet AVR ', "Update: ".$Name);
				if ($Ident == "CVFL" || $Ident == "CVFR" || $Ident == "CVC" || $Ident == "CVSW" || $Ident == "CVSL" || $Ident == "CVSR")
					{
						$Command = "CV";
					}
				elseif($Ident == "PSDYNVOL")//Dynamic Volume
					{
						$Command = "PSDYNVOL ";
					}
				elseif($Ident == "PSVOLLEV")//Dolby Volume Leveler
					{
						$Command = "PSVOLLEV ";
					}
				elseif($Ident == "PSVOLMOD")//Dolby Volume Modeler
					{
						$Command = "PSVOLMOD ";
					}
				elseif($Ident == "PSDOLVOL")//Dolby Volume
					{
						$Command = "PSDOLVOL ";
					}
				elseif($Ident == "PSPAN")//Panorama
					{
						$Command = "PSPAN ";
					}
				elseif($Ident == "PSMULTEQ")//PSMULTEQ
					{
						$Command = "PSMULTEQ: ";
					}
				elseif($Ident == "PVCM")//Chroma Level
					{
						$Command = "PVCM ";
					}
				elseif($Ident == "PSSWR")//Subwoofer
					{
						$Command = "PSSWR ";
					}
				elseif($Ident == "PSEFF")//Effekt
					{
						$Command = "PSEFF ";
					}
				elseif($Ident == "PVCN")//Contrast
					{
						$Command = "PVCN ";
					}
				elseif($Ident == "PVENH")//Enhancer
					{
						$Command = "PVENH ";
					}
				elseif($Ident == "PSSWR")//Subwoofer
					{
						$Command = "PSSWR ";
					}
				elseif($Ident == "PSEFF") //Effekt Level
					{
						$Command = "PSEFF ";
					}
				elseif($Ident == "VSVST") //Vertical Stretch
					{
						$Command = "VSVST ";
					}
				elseif($Ident == "PSRSZ") //Room Size
					{
						$Command = "PSRSZ ";
					}
				elseif($Ident == "PSCINEMA_EQ") //Cinema EQ
					{
						$Command = "PSCINEMA EQ. ";
					}
				elseif($Ident == "PSTONE_CTRL") //Tone CTRL
					{
						$Command = "PSTONE CTRL ";
					}
				elseif($Ident == "PSDELAY") //Audio Delay
					{
						$Command = "PSDELAY ";
					}
				elseif($Ident == "MSQUICK") //MSQUICK
					{
						$Command = "MSQUICK ";
					}
				elseif($Ident == "PSSB") //Surround Back Mode
					{
						$Command = "PSSB: ";
					}
				elseif($Ident == "PVBR") //Brightness
					{
						$Command = "PVBR ";
					}
				elseif($Ident == "PVHUE") //Hue
					{
						$Command = "PVHUE ";
					}
				elseif($Ident == "PSATT") //Subwoofer ATT
					{
						$Command = "PSATT ";
					}
				elseif($Ident == "PSSTW") //Stage Width
					{
						$Command = "PSSTW ";
					}
				elseif($Ident == "PSSTH") //Stage Height
					{
						$Command = "PSSTH ";
					}
				elseif($Ident == "PSMODE") //Surround Play Mode
					{
						$Command = "PSMODE: ";
					}
				elseif($Ident == "PSAFD") //AFDM
					{
						$Command = "PSAFD ";
					}
				elseif($Ident == "PSSP") // Speaker Output Front
					{
						$Command = "PSSP".chr(58).chr(32);
					}
				elseif($Ident == "VSASP") //ASP
					{
						$Command = "VSASP ";
					}
				elseif($Ident == "PSCEI") //Center Image
					{
						$Command = "PSCEI ";
					}
				elseif($Ident == "PVCN") //Contrast
					{
						$Command = "PVCN ";
					}
				elseif($Ident == "PSREFLEV") //Reference Level
					{
						$Command = "PSREFLEV ";
					}
				elseif($Ident == "VSSCH") //HDMI Audio
					{
						$Command = "VSSCH ";
					}
				elseif($Ident == "VSAUDIO") //HDMI Audio Output
					{
						$Command = "VSAUDIO ";
					}
				elseif($Ident == "PSEFF") //Effect Level
					{
						$Command = "PSEFF ";
					}
				elseif($Ident == "PSEFF_O") //Effect
					{
						$Command = "PSEFF ";
					}
				elseif($Ident == "PSDSX") //Audyssey DSX
					{
						$Command = "PSDSX ";
					}
				elseif($Ident == "VSMONI") //Video Processing Mode
					{
						$Command = "VSMONI ";
					}
				elseif($Ident == "VSSC") //Resolution
					{
						$Command = "VSSC ";
					}
				elseif($Ident == "VSSCH") //Resolution HDMI
					{
						$Command = "VSSCH ";
					}
				elseif($Ident == "PVDNR") //Digital Noise Reduction
					{
						$Command = "PVDNR ";
					}	
				else
					{
						$Command = $Ident;
					}
				$request = $Command.chr(63);
				if ($Ident !== "MNMEN" || $Ident !== "MNSRC" || $Ident !== "MN")
				{
					$this->SendCommand($request);
					IPS_Sleep(100);  
				}
				
				}
		
		}
		
		
		/*
		$states  = array ("Power" => "PW", "Volume" => "MV", "Mute" => "MU", "Channel Volume" => "CV",
		"Input" => "SI", "Main Zone Power" => "ZM", "Rec Select" => "SR", "Input Mode" => "SD",
		"Digital Input" => "DC", "Video Select" => "SV", "Sleep" => "SLP", "Surround Mode" => "MS",
		"Quick" => "MSQUICK ", "Monitor Status" => "VSMONI ", "ASP" => "VSASP ", "Video Resolution" => "VSSC ",
		"Video Resolution HDMI" => "VSSCH ", "HDMI Audio" => "VSAUDIO ", "Video Processing Mode" => "VSVPM ", "Vertical Stretch" => "VSVST ",
		"Tone Control" => "PSTONE CTRL ", "Surround Back" => "PSSB: ", "Cinema EQ" => "PSCINEMA EQ. ", "Mode" => "PSMODE: ",
		"Dolby Volume Direct Change" => "PSDOLVOL ", "Dolby Volume Leveler" => "PSVOLLEV ", "Dolby Volume Modeler" => "PSVOLMOD ", "Front Height" => "PSFH: ",
		"PLIIZ Height Gain" => "PSPHG ", "Speaker Output" => "PSSP: ", "Multi EQ XT" => "PSMULTEQ: ", "Dynamic EQ" => "PSDYNEQ ",
		"Reference Level" => "PSREFLEV ", "Dynamic Volume" => "PSDYNVOL ", "Audyssey DSX" => "PSDSX ", "Stage Width" => "PSSTW ",
		"Stage Height" => "PSSTH ", "Bass Level" => "PSBAS ", "Treble Level" => "PSTRE ", "DRC Direct Change" => "PSDRC ",
		"AFDM" => "PSAFD ", "Panorama" => "PSPAN ", "Dimension" => "PSDIM ", "Center Width" => "PSCEN ",
		"Center Image" => "PSCEI ", "Subwoofer ATT" => "PSATT ", "Subwoofer" => "PSSWR ", "Room Size" => "PSRSZ ",
		"Audio Delay" => "PSDELAY ", "Audio Restorer" => "PSRSTR ", "Contrast" => "PVCN ", "Brightness" => "PVBR ",
		"Chroma" => "PVCM ", "Hue" => "PVHUE ", "DNR Direct Change" => "PVDNR ", "Enhancer" => "PVENH ", "Effect" => "PSEFF ",
		"Zone 2" => "Z2", "Zone 2 Mute" => "Z2MU", "Zone 2 Channel Setting" => "Z2CS", "Zone 2 Channel Volume" => "Z2CV",
		"Zone 2 HPF" => "Z2HPF", "Zone 2 Bass" => "Z2PSBAS ", "Zone 2 Treble" => "Z2PSTRE ", "Zone 2 Quick" => "Z2QUICK ",
		"Zone 2 Sleep" => "Z2SLP",	"Zone 3" => "Z3", "Zone 3 Mute" => "Z3MU", "Zone 3 Channel Setting" => "Z3CS", "Zone 3 Channel Volume" => "Z3CV",
		"Zone 3 HPF" => "Z3HPF", "Zone 3 Bass" => "Z3PSBAS ", "Zone 3 Treble" => "Z3PSTRE ", "Zone 3 Quick" => "Z3QUICK "
		);
		*/
		
	}
	
	public function RequestAction($Ident, $Value)
    {
        /*
		try
        {
            $this->GetZone();
        } catch (Exception $ex)
        {
//            trigger_error($ex->getMessage(), $ex->getCode());
            echo $ex->getMessage();
            return false;
        }
		*/
		
		
		$APIData = new DenonAVRCP_API_Data();
		$APIData->APIIdent = $Ident;
        $APIData->Data = $Value;
		$APIData->AVRType = $this->GetAVRType();
		$APIData->AVRZone = $this->ReadPropertyInteger('Zone');
		//Input �bergeben
		$APIData->InputMapping = DAVRST_GetInputVarMapping($this->GetParent());
        //Pr�fen ob Command vorhanden
		/*
		if (!$this->DenonZone->CmdAvaiable($APIData))
        {
//            trigger_error("Illegal Command in this Zone.", E_USER_WARNING);
            echo "Illegal Command in this Zone";
            return false;
        }
		*/
        // Subcommand holen
        $APIData->APISubCommand = $APIData->GetSubCommand($APIData->APIIdent, $APIData->Data, $APIData->InputMapping);
        IPS_LogMessage('Denon Telnet AVR', "Denon Subcommand: ".$APIData->APISubCommand);
        // Daten senden        R�ckgabe ist egal, Variable wird automatisch durch Datenempfang nachgef�hrt
        try
        {
            //Command aus Ident
			$APIData->APICommand = str_replace("_", " ", $Ident); //Ident _ von Ident mit Leerzeichen ersetzten
			if($Ident == "Z2POWER" || $Ident == "Z2INPUT" || $Ident == "Z2VOL")
			{
				$APIData->APICommand = "Z2";
			}		
			elseif($Ident == "Z3POWER" || $Ident == "Z3INPUT" || $Ident == "Z3VOL")
			{
				$APIData->APICommand = "Z3";
			}
			
			$payload = $APIData->APICommand.$APIData->APISubCommand;
			$this->SendCommand($payload);
					
			
			//Commands ohne automatischen Response
			if ($APIData->APICommand == "PSVOLLEV")// Dolby Volume Leveler
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSVOLMOD")// Dolby Volume Modeler
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSDCO")// Dynamic Compressor
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSDRC")// Dynamic Range Compression
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSPAN")//Panorama
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSDYNEQ")//Dynamic EQ
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSAFD")//
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "VSAUDIO")
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "PSRSZ")// Room Size
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "VSSC")//Resolution
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "VSSCH")//Resolution HDMI
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			elseif ($APIData->APICommand == "CV")//Channel Volume
			{
				$this->SendRequest($APIData->APICommand, false);
			}
			elseif ($APIData->APICommand == "PSSWR")//Subwoofer
			{
				$this->SendRequest($APIData->APICommand, true);
			}
			
        } 
		catch (Exception $ex)
        {
//            trigger_error($ex->getMessage(), $ex->getCode());
            echo $ex->getMessage();
            return false;
//            return;
        }

        /*        if ($ret === false)
          {
          echo "Error on Send.";
          return;
          } */
		
    }
	
	protected function SendRequest($APICommand, $Space)
	{
		IPS_Sleep(30);
		if ($Space)
		{
			$APISubCommand = chr(32).chr(63);
		}
		elseif (!$Space)
		{
			$APISubCommand = chr(63);
		}
		$payload = $APICommand.$APISubCommand;
		$this->SendCommand($payload);
	}
	
	protected function GetParent()
    {
        $instance = IPS_GetInstance($this->InstanceID);//array
		return ($instance['ConnectionID'] > 0) ? $instance['ConnectionID'] : false;//ConnectionID
    }
	
	//Data Transfer
	public function SendCommand($payload)
		{
			$sendcommand = $payload.chr(13);
			$this->SendDataToParent(json_encode(Array("DataID" => "{01A68655-DDAF-4F79-9F35-65878A86F344}", "Buffer" => $sendcommand))); //Denon AVR Telnet Interface GUI
		}
	
	// Daten vom Splitter Instanz
	public function ReceiveData($JSONString)
	{
	 
		// Empfangene Daten vom Splitter
		$data = json_decode($JSONString);
		//$datasplitter = json_encode($data->Buffer->Data);
		//SetValueString($this->GetIDForIdent("BufferIN"), $datasplitter);
		$message = json_encode($data->Buffer->Data);
		IPS_LogMessage("Denon Telnet AVR", "Received Data:".utf8_decode($message));
		$response = json_encode($data->Buffer);
		//SetValueString($this->GetIDForIdent("Response"), $response);
		$this->UpdateVariable($data->Buffer);
	 
	}	
	
	// Wertet Response aus und setzt Variable
	private function UpdateVariable($data)
    {
		$ResponseType = $data->ResponseType;
		$Zone = $this->ReadPropertyInteger('Zone');
		if($ResponseType == "HTTP")
		{
			$Zonedata = $data->Data;
			if($Zone == 0)
			{
				$datavalues = $Zonedata->Mainzone;
			}
			elseif($Zone == 1)
			{
				$datavalues = $Zonedata->Zone2;
			}
			elseif($Zone == 2)
			{
				$datavalues = $Zonedata->Zone3;
			}
		}
		elseif($ResponseType == "TELNET")
		{
			$datavalues = $data->Data;
			//Surround Display
			if ($this->ReadPropertyBoolean('SurroundDisplay'))
			{
				$SurroundDisplay = $data->SurroundDisplay;
				if($SurroundDisplay !== "")
				{
					SetValueString($this->GetIDForIdent("SurroundDisplay"), $SurroundDisplay);
				}
			}
			// Display
			if ($this->ReadPropertyBoolean('Display'))
			{
				$NSADisplay = $data->NSADisplay;
				$NSADisplayLog = json_encode($NSADisplay);
				IPS_LogMessage("Denon Telnet AVR", "Display: ".$NSADisplayLog);
				$DisplayHTML = GetValue($this->GetIDForIdent("Display"));
				$doc = new DOMDocument();
				$doc->loadHTML($DisplayHTML);
				foreach ($NSADisplay as $row => $content)
				{
					if($row == 0)
						{
							$doc->getElementById('NSARow0')->nodeValue = $content;
						}
					if($row == 1)
						{
							$doc->getElementById('NSARow1')->nodeValue = $content;
						}
					if($row == 2)
						{
							$doc->getElementById('NSARow2')->nodeValue = $content;
						}
					if($row == 3)
						{
							$doc->getElementById('NSARow3')->nodeValue = $content;
						}
					if($row == 4)
						{
							$doc->getElementById('NSARow4')->nodeValue = $content;
						}
					if($row == 5)
						{
							$doc->getElementById('NSARow5')->nodeValue = $content;
						}
					if($row == 6)
						{
							$doc->getElementById('NSARow6')->nodeValue = $content;
						}
					if($row == 7)
						{
							$doc->getElementById('NSARow7')->nodeValue = $content;
						}
					if($row == 8)
						{
							$doc->getElementById('NSARow8')->nodeValue = $content;
						}
					if($row == 9)
						{
							$doc->getElementById('NSARow9')->nodeValue = $content;
						}
					$search = preg_match("/\[.[0-9]?[0-9]\/[0-9][0-9]?.\]/", $content, $treffer);	
					if($search == 1) //auf Cursorposition pr�fen
						{
							$pos = strpos($content, "/");
							$CurrentPosition = trim(substr ( $content , ($pos-2), 2 ));
							$MaxPosition = trim(substr ( $content , ($pos+1), 2 ));
						}
				}
				SetValueString($this->GetIDForIdent("Display"), $doc->saveHTML());	
			}
		}
		
			foreach($datavalues as $Ident => $Values)
			{
				$Ident = str_replace(" ", "_", $Ident); //Ident Leerzeichen von Command mit _ ersetzten
				$Subcommand = $Values->Subcommand;
				$VarType = $Values->VarType;
				$Subcommandvalue = $Values->Value;
				$VarID = @$this->GetIDForIdent($Ident); 
				if ($VarID > 0) 
				{ 
					if ($ResponseType == "HTTP")
					{
						if ($Ident == "MainZoneName" || $Ident == "Zone2Name" || $Ident == "Zone3Name" || $Ident == "Model")
						{
							switch ($VarType)
							{
								case 0: //Boolean
									SetValueBoolean($this->GetIDForIdent($Ident), $Subcommandvalue);
									IPS_LogMessage("Denon Telnet AVR", "Update HTTP ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
									break;
								case 1: //Integer
									SetValueInteger($this->GetIDForIdent($Ident), $Subcommandvalue);
									IPS_LogMessage("Denon Telnet AVR", "Update HTTP ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
									break;
								case 2: //Float
									SetValueFloat($this->GetIDForIdent($Ident), $Subcommandvalue);
									IPS_LogMessage("Denon Telnet AVR", "Update HTTP ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
									break;     
								case 3: //String
									SetValueString($this->GetIDForIdent($Ident), $Subcommandvalue);
									IPS_LogMessage("Denon Telnet AVR", "Update HTTP ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
									break;
							}	
							
							//$this->SetVarResponse($Ident, $Subcommandvalue, $Subcommand, $VarType);
						}	
					}
					elseif ($ResponseType == "TELNET")
					{
						switch ($VarType)
						{
							case 0: //Boolean
								SetValueBoolean($this->GetIDForIdent($Ident), $Subcommandvalue);
								IPS_LogMessage("Denon Telnet AVR", "Update ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
								break;
							case 1: //Integer
								SetValueInteger($this->GetIDForIdent($Ident), $Subcommandvalue);
								IPS_LogMessage("Denon Telnet AVR", "Update ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
								break;
							case 2: //Float
								SetValueFloat($this->GetIDForIdent($Ident), $Subcommandvalue);
								IPS_LogMessage("Denon Telnet AVR", "Update ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
								break;     
							case 3: //String
								SetValueString($this->GetIDForIdent($Ident), $Subcommandvalue);
								IPS_LogMessage("Denon Telnet AVR", "Update ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
								break;
						}	
						
						//$this->SetVarResponse($Ident, $Subcommandvalue, $Subcommand, $VarType);
					}	
				}
				else
				{ 
				// nicht vorhanden 
				}  
			}
		
    }
	/*
	protected function SetVarResponse($Ident, $Subcommandvalue, $Subcommand, $VarType)
	{
		switch ($VarType)
			{
				case 0: //Boolean
					SetValueBoolean($this->GetIDForIdent($Ident), $Subcommandvalue);
					IPS_LogMessage("Update Denon", "ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
					break;
				case 1: //Integer
					SetValueInteger($this->GetIDForIdent($Ident), $Subcommandvalue);
					IPS_LogMessage("Update Denon", "ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
					break;
				case 2: //Float
					SetValueFloat($this->GetIDForIdent($Ident), $Subcommandvalue);
					IPS_LogMessage("Update Denon", "ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
					break;     
				case 3: //String
					SetValueString($this->GetIDForIdent($Ident), $Subcommandvalue);
					IPS_LogMessage("Update Denon", "ObjektID(".$this->GetIDForIdent($Ident)."): ".$Subcommand);
					break;
			}	
	}
	*/
	//IP Denon 
	protected function GetIPDenon(){
		$ParentID = $this->GetParent();
		$IPDenon = IPS_GetProperty($ParentID, 'Host');
			
		if (!filter_var($IPDenon, FILTER_VALIDATE_IP) === false)
		{
			return $IPDenon;
		}
		else
		{
			return false;
		}
		
	}
	
	 protected function GetVariable($Ident, $VarType, $VarName, $Profile, $EnableAction)
    {
        $VarID = @$this->GetIDForIdent($Ident);
        if ($VarID > 0)
        {
            if (IPS_GetVariable($VarID)['VariableType'] <> $VarType)
            {
                IPS_DeleteVariable($VarID);
                $VarID = false;
            }
        }
        if ($VarID === false)
        {
            $this->MaintainVariable($Ident, $VarName, $VarType, $Profile, 0, true);
            if ($EnableAction)
                $this->MaintainAction($Ident, true);
            $VarID = $this->GetIDForIdent($Ident);
        }
        return $VarID;
    }
	
	//Get Status HTTP 
	public function GetStateHTTP()
	{
		$DenonGet = new DENON_StatusHTML;
		$DenonGet->ipdenon = $this->GetIPDenon();
		$state = $DenonGet->getStates (0);
		return $state;
	}
	
	protected function RegisterProfileIntegerDenon($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits)
	{
        
        if(!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 1);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 1)
            throw new Exception("Variable profile type does not match for profile ".$Name);
        }
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
        IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize);
        
    }
	
	protected function RegisterProfileIntegerDenonAss($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Associations)
	{
        if ( sizeof($Associations) === 0 ){
            $MinValue = 0;
            $MaxValue = 0;
        } else {
            $MinValue = $Associations[0][0];
            $MaxValue = $Associations[sizeof($Associations)-1][0];
        }
        
        $this->RegisterProfileIntegerDenon($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits);
        
		//boolean IPS_SetVariableProfileAssociation ( string $ProfilName, float $Wert, string $Name, string $Icon, integer $Farbe )
        foreach($Associations as $Association) {
            IPS_SetVariableProfileAssociation($Name, $Association[0], $Association[1], $Association[2], $Association[3]);
        }
        
    }
	
	protected function WriteUpdateProfileInputs($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Associations)
	{
		if ( sizeof($Associations) === 0 ){
            $MinValue = 0;
            $MaxValue = 0;
        } else {
            $MinValue = $Associations[0][0];
            $MaxValue = $Associations[sizeof($Associations)-1][0];
        }
        
		if(!IPS_VariableProfileExists($Name))
			{
            IPS_CreateVariableProfile($Name, 1);
			}
		elseif(IPS_VariableProfileExists($Name))
			{
				IPS_DeleteVariableProfile($Name);
				IPS_CreateVariableProfile($Name, 1);
			}
		else
			{
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 1)
            throw new Exception("Variable profile type does not match for profile ".$Name);
			}
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
        IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $Stepsize);
        
        foreach($Associations as $Association) {
            IPS_SetVariableProfileAssociation($Name, $Association[0], $Association[1], $Association[2], $Association[3]);
        }
	}
	
	//protected function RegisterProfileStringDenon($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize)
	protected function RegisterProfileStringDenon($Name, $Icon)
	{
        
        if(!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 3);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 3)
            throw new Exception("Variable profile type does not match for profile ".$Name);
        }
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        //IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
        //IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize);
        
    }
	
	protected function RegisterProfileFloatDenon($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits)
	{
        
        if(!IPS_VariableProfileExists($Name)) {
            IPS_CreateVariableProfile($Name, 2);
        } else {
            $profile = IPS_GetVariableProfile($Name);
            if($profile['ProfileType'] != 2)
            throw new Exception("Variable profile type does not match for profile ".$Name);
        }
        
        IPS_SetVariableProfileIcon($Name, $Icon);
        IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
        IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize);
        
    }

	
	private function SendAPIData(DenonAVRCP_API_Data $APIData)
    {
        $ret = $this->Send($APIData);
		/*
		$DualType = substr($APIData->APICommand, 3, 1);
        $APIData->APICommand = substr($APIData->APICommand, 0, 3);
        if ($APIData->Mapping === null)
            $APIData->GetMapping();

        IPS_LogMessage('SendAPIData', print_r($APIData, 1));

        // Variable konvertieren..        
        switch ($APIData->Mapping->VarType)
        {
            case IPSVarType::vtBoolean:
                $APIData->Data = ISCP_API_Commands::$BoolValueMapping[$APIData->Data];
                break;
            case IPSVarType::vtFloat:
//                echo "Float VarType not implemented.";

                throw new Exception("Float VarType not implemented.", E_USER_NOTICE);
                break;
            case IPSVarType::vtInteger:
                if ($APIData->Mapping->ValueMapping == null)
                    $APIData->Data = strtoupper(substr('0' . dechex($APIData->Data), -2));
                else
                {
                    $Mapping = array_flip($APIData->Mapping->ValueMapping);
                    if (array_key_exists($APIData->Data, $Mapping))
                        $APIData->Data = $Mapping[$APIData->Data];
                    else
                        $APIData->Data = strtoupper(substr('0' . dechex($APIData->Data), -2));
                }
                break;
            case IPSVarType::vtDualInteger:
                if ($DualType === false)
                {
                    throw new Exception("Error on get DualInteger.", E_USER_NOTICE);
//                    echo "Error on get DualInteger.";
//                    return false;
                }
                $Prefix = array_flip($APIData->Mapping->ValuePrefix)[$DualType];
                $Mapping = array_flip($APIData->Mapping->ValueMapping);
                if (array_key_exists($APIData->Data, $Mapping))
                    $APIData->Data = $Prefix . $Mapping[$APIData->Data];
                else
                    $APIData->Data = strtoupper($Prefix . substr('0' . dechex($APIData->Data), -2));
                break;
            default:
//                echo "Unknow VarType.";
//                return;
                throw new Exception("Unknow VarType.", E_USER_NOTICE);
                break;
        }
        try
        {
            $ret = $this->Send($APIData);
        } catch (Exception $exc)
        {
            throw $exc;
        }

        if ($ret->Data == "N/A")
        {
            throw new Exception("Command (temporally) not available.", E_USER_NOTICE);
//            return;
        }
        switch ($APIData->Mapping->VarType)
        {
            case IPSVarType::vtBoolean:
            case IPSVarType::vtInteger:
            case IPSVarType::vtFloat:
                if ($ret->Data <> $APIData->Data)
                {
                    IPS_LogMessage('RequestAction', print_r($APIData, 1));
                    IPS_LogMessage('RequestActionResult', print_r($ret, 1));
                    throw new Exception("Value not available.", E_USER_NOTICE);
//                    echo "Value not available.";
//                    return;
                }
                break;
            case IPSVarType::vtDualInteger:
                if (strpos($ret->Data, $APIData->Data) === false)
                {
                    IPS_LogMessage('RequestAction', print_r($APIData, 1));
                    IPS_LogMessage('RequestActionResult', print_r($ret, 1));
                    throw new Exception("Value not available.", E_USER_NOTICE);
//                    echo "Value not available.";
//                    return;
                }
                break;
        }

        return $ret;
		*/
    }

    //private function Send(DenonAVRCP_API_Data $APIData, $needResponse = true)
	private function Send(DenonAVRCP_API_Data $APIData)
    {
        //Validate
		/*
		if (!$this->DenonZone->CmdAvaiable($APIData))
            throw new Exception("Command not available at this Zone.", E_USER_NOTICE);
        if (!$this->HasActiveParent())
            throw new Exception("Instance has no active Parent.", E_USER_NOTICE);

        $ReplyAPIDataID = $this->GetIDForIdent('ReplyAPIData');
        if (!$this->lock('RequestSendData'))
            throw new Exception('RequestSendData is locked', E_USER_NOTICE);

        if ($needResponse)
        {
            if (!$this->lock('ReplyAPIData'))
            {
                $this->unlock('RequestSendData');
                throw new Exception('ReplyAPIData is locked', E_USER_NOTICE);
            }
            SetValueString($ReplyAPIDataID, '');
            $this->unlock('ReplyAPIData');
        }
		*/
        $ret = $this->SendDataToParent($APIData);
        /*
		if ($ret === false)
        {
//            IPS_LogMessage('exc',print_r($ret,1));
            $this->unlock('RequestSendData');
            throw new Exception('Instance has no active Parent Instance!', E_USER_NOTICE);
        }
//        IPS_LogMessage('noexc', print_r($ret, 1));
        if (!$needResponse)
        {
            $this->unlock('RequestSendData');
            return true;
        }
        $ReplayAPIData = $this->WaitForResponse($APIData->APICommand);

        //        IPS_LogMessage('ReplayATData:'.$this->InstanceID,print_r($ReplayATData,1));

        if ($ReplayAPIData === false)
        {
            //          Senddata('TX_Status','Timeout');
            $this->unlock('RequestSendData');
            throw new Exception('Send Data Timeout', E_USER_NOTICE);
        }
        //            Senddata('TX_Status','OK')
        $this->unlock('RequestSendData');
        return $ReplayAPIData;
		*/
    }
	
	
	######################### Denon Commands #######################################
	//Power
	public function Power(boolean $Value) // false (Standby) oder true (On)
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::PWSTANDBY;
				
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::PWON;
			}
		$payload = DENON_API_Commands::PW.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Mainzone Power
	public function MainZonePower(boolean $Value) // MainZone true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::ZMOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::ZMON;
			}
		
		$payload = DENON_API_Commands::ZM.$subcommand;
		$this->SendCommand($payload);
	}
		
	//Master Volume
	public function MasterVolume(string $command) // "UP" or "DOWN" 
	{
		$payload = DENON_API_Commands::MV.$command;
		$this->SendCommand($payload);
	}
	
	public function MasterVolumeFix(float $Value) // float -80 bis 18 Schrittweite 0.5
	{
		$FunctionType = "Volume";
		$command = $this->GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::MV.$command;
		$this->SendCommand($payload);
	}
	
	//Main Mute
	public function MainMute(boolean $Value) // false (Off) oder true (On)
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::MUOFF;
				
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::MUON;
			}
		$payload = DENON_API_Commands::MU.$subcommand;
		$this->SendCommand($payload);
	}
		
	//Input
	public function Input(string $command) // NET/USB; USB; NAPSTER; LASTFM; FLICKR; FAVORITES; IRADIO; SERVER; SERVER;  USB/IPOD
	{
		$payload = DENON_API_Commands::SI.$command;
		$this->SendCommand($payload);
	}
	
	//Get Display NSADisplay
	public function NSADisplay()
	{
		$payload = DENON_API_Commands::NSA;
		$this->SendCommand($payload);
	}
	
	public function NSEDisplay()
	{
		$payload = DENON_API_Commands::NSE;
		$this->SendCommand($payload);
	}
	
	//Dynamic Volume
	public function DynamicVolume(string $Value) // Dynamic Volume  Midnight / Evening / Day
	{
		if ($Value == "Midnight")
			{
				$subcommand = DENON_API_Commands::DYNVOLNGT;
			}
		elseif ($Value == "Evening")
			{
				$subcommand = DENON_API_Commands::DYNVOLEVE;
			}
		elseif ($Value == "Day")
			{
				$subcommand = DENON_API_Commands::DYNVOLDAY;
			}
			
		$payload = DENON_API_Commands::PSDYNVOL.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Dolby Volume
	public function DolbyVolume(boolean $Value) // Dolby Volume true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::DOLVOLOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::DOLVOLON;
			}
		
		$payload = DENON_API_Commands::PSDOLVOL.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Dolby Volume Modeler
	public function DolbyVolumeModeler(string $Value) // Dolby Volume Modeler Off / Half / Full
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::VOLMODOFF;
			}
		elseif ($Value == "Half")
			{
				$subcommand = DENON_API_Commands::VOLMODHLF;
			}
		elseif ($Value == "Full")
			{
				$subcommand = DENON_API_Commands::VOLMODFUL;
			}
			
		$payload = DENON_API_Commands::PSVOLMOD.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Dolby Volume Leveler
	public function DolbyVolumeLeveler(string $Value) // Dolby Volume Leveler Low / Middle / High
	{
		if ($Value == "Low")
			{
				$subcommand = DENON_API_Commands::DYNVOLNGT;
			}
		elseif ($Value == "Middle")
			{
				$subcommand = DENON_API_Commands::DYNVOLEVE;
			}
		elseif ($Value == "High")
			{
				$subcommand = DENON_API_Commands::DYNVOLDAY;
			}
			
		$payload = DENON_API_Commands::PSVOLLEV.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Dynamic Compressor
	public function DynamicCompressor(string $Value) // Dynamic Compressor Off / Low / Middle / High
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::DCOOFF;
			}
		elseif ($Value == "Low")
			{
				$subcommand = DENON_API_Commands::DCOLOW;
			}	
		elseif ($Value == "Middle")
			{
				$subcommand = DENON_API_Commands::DCOMID;
			}
		elseif ($Value == "High")
			{
				$subcommand = DENON_API_Commands::DCOHIGH;
			}
			
		$payload = DENON_API_Commands::PSDCO.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Dynamic Range Compression
	public function DynamicRangeCompression(string $Value) // Dynamic Range Compression Off / Auto / Low / Middle / High
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::DRCOFF;
			}
		elseif ($Value == "Auto")
			{
				$subcommand = DENON_API_Commands::DRCAUTO;
			}		
		elseif ($Value == "Low")
			{
				$subcommand = DENON_API_Commands::DRCLOW;
			}	
		elseif ($Value == "Middle")
			{
				$subcommand = DENON_API_Commands::DRCMID;
			}
		elseif ($Value == "High")
			{
				$subcommand = DENON_API_Commands::DRCHI;
			}
			
		$payload = DENON_API_Commands::PSDRC.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Audyssey DSX
	public function AudysseyDSX(string $Value) // Audyssey DSX Off / Wide (Audyssey DSX ON(Wide)) / Height (Audyssey DSX ON(Height)) / Height/Wide (Audyssey DSX ON(Height/Wide))
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::PSDSXOFF;
			}
		elseif ($Value == "Wide")
			{
				$subcommand = DENON_API_Commands::PSDSXONW;
			}	
		elseif ($Value == "Height")
			{
				$subcommand = DENON_API_Commands::PSDSXONH;
			}
		elseif ($Value == "Height/Wide")
			{
				$subcommand = DENON_API_Commands::PSDSXONHW;
			}
			
		$payload = DENON_API_Commands::PSDSX.$subcommand;
		$this->SendCommand($payload);
	}
		
	//CinemaEQ
	public function CinemaEQ(boolean $Value) // CinemaEQ true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::CINEMAEQOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::CINEMAEQON;
			}
		$payload = DENON_API_Commands::CINEMAEQCOMMAND.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Panorama
	public function Panorama(boolean $Value) // Panorama true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::PANOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::PANON;
			}
		$payload = DENON_API_Commands::PS.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Dynamic EQ
	public function DynamicEQ(boolean $Value) // Dynamic EQ true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::DYNEQOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::DYNEQON;
			}
		$payload = DENON_API_Commands::PSDYNEQ.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Channel Volume
	public function ChannelVolumeFL(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFL.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeFR(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFR.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeC(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVC.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeSW(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSW.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeSW2(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSW2.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeSL(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSL.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeSR(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSR.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeSBL(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSBL.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeSBR(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSBR.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeSB(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSB.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeFHL(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFHL.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeFHR(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFHR.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeFWL(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFWL.$command;
		$this->SendCommand($payload);
	}

	public function ChannelVolumeFWR(float $Value) // Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFWR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeSHL(float $Value) //Surround Height Left Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSHL.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeSHR(float $Value) //Surround Height Right Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSHR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTS(float $Value) //Top Surround Range -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTS.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTFL(float $Value) //Top Front Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTFL.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTFR(float $Value) //Top Front Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTFR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTML(float $Value) //Top Middle Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTML.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTMR(float $Value) //Top Middle Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTMR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTRL(float $Value) //Top Rear Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTRL.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeTRR(float $Value) //Top Rear Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVTRR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeRHL(float $Value) // Rear Height Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVRHL.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeRHR(float $Value) // Rear Height Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVRHR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeFDL(float $Value) // Front Dolby Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFDL.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeFDR(float $Value) // Front Dolby Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVFDR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeSDL(float $Value) // Surround Dolby Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSDL.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeSDR(float $Value) // Surround Dolby Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSDR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeBDL(float $Value) // Back Dolby Left -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSDR.$command;
		$this->SendCommand($payload);
	}
	
	public function ChannelVolumeBDR(float $Value) // Back Dolby Right -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CVSDR.$command;
		$this->SendCommand($payload);
	}
		
	//RecSelect
	public function RecSelect(string $command) // NET/USB; USB; NAPSTER; LASTFM; FLICKR; FAVORITES; IRADIO; SERVER; SERVER;  USB/IPOD
	{
		$payload = DENON_API_Commands::SR.$command;
		$this->SendCommand($payload);
	}

	
	//Video Select
	public function VideoSelect(string $command) // Video Select DVD/BD/TV/SAT_CBL/DVR/GAME/V.AUX/DOCK/SOURCE
	{
		$payload = DENON_API_Commands::SV.$command;
		$this->SendCommand($payload);
	}
	
	//Subwoofer
	public function Subwoofer(boolean $Value) // Subwoofer true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::PSSWROFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::PSSWRON;
			}
		$payload = DENON_API_Commands::PSSWR.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Subwoofer ATT
	public function SubwooferATT(boolean $Value) // Subwoofer ATT true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::ATTOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::ATTON;
			}
		$payload = DENON_API_Commands::PS.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Front Height
	public function FrontHeight(boolean $Value) // Front Height true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::PSFHOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::PSFHON;
			}
		$payload = DENON_API_Commands::PS.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Tone CTRL
	public function ToneCTRL(boolean $Value) // Tone CTRL true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::PSTONECTRLOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::PSTONECTRLON;
			}
		$payload = DENON_API_Commands::TONECTRL.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Audio Delay
	public function AudioDelay(integer $Value) // can be operated from 0 to 300
	{
		$FunctionType = "AudioDelay";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::CV.DENON_API_Commands::PSDELAY.$command;
		$this->SendCommand($payload);
	}
	
	//Speaker Output Front 
	public function SpeakerOutputFront(string $Value) // Speaker Output Front Off / Wide / Height / Height/Wide
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::SPOFF;
			}
		elseif ($Value == "Wide")
			{
				$subcommand = DENON_API_Commands::SPFW;
			}	
		elseif ($Value == "Height")
			{
				$subcommand = DENON_API_Commands::SPHW;
			}
		elseif ($Value == "Height/Wide")
			{
				$subcommand = DENON_API_Commands::SPHW;
			}
			
		$payload = DENON_API_Commands::PSSP.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Auto Flag Detect Mode
	public function AutoFlagDetectMode(boolean $Value) // Auto Flag Detect Mode true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::AFDOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::AFDON;
			}
		$payload = DENON_API_Commands::PSAFD.$subcommand;
		$this->SendCommand($payload);
	}
	
	//ASP
	public function ASP(string $Value) // ASP Normal / Full
	{
		if ($Value == "Normal")
			{
				$subcommand = DENON_API_Commands::ASPNRM;
			}
		elseif ($Value == "Full")
			{
				$subcommand = DENON_API_Commands::ASPFUL;
			}	
					
		$payload = DENON_API_Commands::VSASP.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Audio Restorer
	public function AudioRestorer(string $Value) // Audio Restorer Off / 64 / 96 / HQ
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::PSRSTROFF;
			}
		elseif ($Value == "64")
			{
				$subcommand = DENON_API_Commands::PSRSTRMODE1;
			}	
		elseif ($Value == "96")
			{
				$subcommand = DENON_API_Commands::PSRSTRMODE2;
			}
		elseif ($Value == "HQ")
			{
				$subcommand = DENON_API_Commands::PSRSTRMODE3;
			}
			
		$payload = DENON_API_Commands::PSRSTR.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Center Image
	public function CenterImage(float $Value) //Center Image can be operated from 0.0 to 1.0 Step 0.1
	{
		$FunctionType = "CenterImage";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PSCEI.$command;
		$this->SendCommand($payload);
	}
	
	//Center Width
	public function CenterWidth(float $Value) //Center Width can be operated from 0 to 7 Step 0.5
	{
		$FunctionType = "CenterWidth";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PSCEN.$command;
		$this->SendCommand($payload);
	}
	
	//Input Mode
	public function SelectDecodeMode(string $command) // AUTO; HDMI; DIGITAL; ANALOG
	{
		$payload = DENON_API_Commands::SD.$command;
		$this->SendCommand($payload);
	  
	}
	
	//Digital Input Mode
	public function DigitalInputMode(string $Value) // Digital Input Mode Auto / PCM / DTS
	{
		if ($Value == "Auto")
			{
				$subcommand = DENON_API_Commands::DCAUTO;
			}
		elseif ($Value == "PCM")
			{
				$subcommand = DENON_API_Commands::DCPCM;
			}	
		elseif ($Value == "DTS")
			{
				$subcommand = DENON_API_Commands::DCDTS;
			}
			
		$payload = DENON_API_Commands::DC.$subcommand;
		$this->SendCommand($payload);
	}
	
	
	//Dimension
	public function Dimension(integer $Value) //Dimension can be operated from 0 to 6
	{
		$FunctionType = "Dimension";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PSDIM.$command;
		$this->SendCommand($payload);
	}
	
	//Effect
	public function Effect(boolean $Value) // Effect true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::PSEFFOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::PSEFFON;
			}
		$payload = DENON_API_Commands::PSEFF.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Effect Level
	public function EffectLevel(float $Value) //Effect Level  can be operated from 1 to 15 Step 0.5
	{
		$FunctionType = "EffectLevel";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PSEFF.$command;
		$this->SendCommand($payload);
	}
	
	//HDMI Audio Output
	public function HDMIAudioOutput(string $Value) // HDMI Audio Output TV / AMP
	{
		if ($Value == "TV")
			{
				$subcommand = DENON_API_Commands::AUDIOTV;
			}
		elseif ($Value == "AMP")
			{
				$subcommand = DENON_API_Commands::AUDIOAMP;
			}	
			
		$payload = DENON_API_Commands::VSAUDIO.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Multi EQ Mode
	public function MultiEQMode(string $Value) // Multi EQ Mode Audyssey / BYP.LR / Flat / Manual / Off
	{
		if ($Value == "Audyssey")
			{
				$subcommand = DENON_API_Commands::MULTEQAUDYSSEY;
			}
		elseif ($Value == "BYP.LR")
			{
				$subcommand = DENON_API_Commands::MULTEQBYPLR;
			}	
		elseif ($Value == "Flat")
			{
				$subcommand = DENON_API_Commands::MULTEQFLAT;
			}
		elseif ($Value == "Manual")
			{
				$subcommand = DENON_API_Commands::MULTEQMANUAL;
			}
		elseif ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::MULTEQOFF;
			}		
		
		$payload = DENON_API_Commands::PSMULTEQ.chr(32).$subcommand;
		$this->SendCommand($payload);
	}
	
	//PLIIZHeightGain
	public function PLIIZHeightGain(string $Value) // PLIIZHeightGain Low / Middle / High
	{
		if ($Value == "Low")
			{
				$subcommand = DENON_API_Commands::PHGLOW;
			}
		elseif ($Value == "Middle")
			{
				$subcommand = DENON_API_Commands::PHGMID;
			}	
		elseif ($Value == "High")
			{
				$subcommand = DENON_API_Commands::PHGHI;
			}	
		
		$payload = DENON_API_Commands::PSPHG.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Reference Level
	public function ReferenceLevel(integer $Value) // Reference Level 0 / 5 / 10 / 15
	{
		if ($Value == 0)
			{
				$subcommand = DENON_API_Commands::REFLEV0;
			}
		elseif ($Value == 5)
			{
				$subcommand = DENON_API_Commands::REFLEV5;
			}	
		elseif ($Value == 10)
			{
				$subcommand = DENON_API_Commands::REFLEV10;
			}
		elseif ($Value == 15)
			{
				$subcommand = DENON_API_Commands::REFLEV15;
			}		
		
		$payload = DENON_API_Commands::PSREFLEV.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Room Size
	public function RoomSize(string $Value) // Room Size Small / Small/Medium / Medium / Medium/Large / Large
	{
		if ($Value == "Small")
			{
				$subcommand = DENON_API_Commands::RSZS;
			}
		elseif ($Value == "Small/Medium")
			{
				$subcommand = DENON_API_Commands::RSZMS;
			}	
		elseif ($Value == "Medium")
			{
				$subcommand = DENON_API_Commands::RSZM;
			}
		elseif ($Value == "Medium/Large")
			{
				$subcommand = DENON_API_Commands::RSZML;
			}
		elseif ($Value == "Large")
			{
				$subcommand = DENON_API_Commands::RSZL;
			}		
		
		$payload = DENON_API_Commands::PSRSZ.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Stage Width
	public function StageWidth(float $Value) //Stage Width can be operated from -10 to +10 Step 0.5
	{
		$FunctionType = "Range10to10";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PSSTW.$command;
		$this->SendCommand($payload);
	}
	
	//Stage Height
	public function StageHeight(float $Value) //Stage Width can be operated from -10 to +10 Step 0.5
	{
		$FunctionType = "Range10to10";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PSSTH.$command;
		$this->SendCommand($payload);
	}
	
	//Surround Back Mode
	public function SurroundBackMode(string $Value) // Surround Back Mode Off / On / Matrix / Cinema / Music
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::SBOFF;
			}
		elseif ($Value == "On")
			{
				$subcommand = DENON_API_Commands::SBON;
			}	
		elseif ($Value == "Matrix")
			{
				$subcommand = DENON_API_Commands::SBMTRXON;
			}
		elseif ($Value == "Cinema")
			{
				$subcommand = DENON_API_Commands::SBPL2XCINEMA;
			}
		elseif ($Value == "Music")
			{
				$subcommand = DENON_API_Commands::SBPL2XMUSIC;
			}	
		
		$payload = DENON_API_Commands::PSSB.$subcommand;
		$this->SendCommand($payload);
	}
		
	//Surround Play Mode
	public function SurroundPlayMode(string $Value) // Surround Play Mode Music / Cinema / Game / Pro Logic
	{
		if ($Value == "Music")
			{
				$subcommand = DENON_API_Commands::MODEMUSIC;
			}
		elseif ($Value == "Cinema")
			{
				$subcommand = DENON_API_Commands::MODECINEMA;
			}	
		elseif ($Value == "Game")
			{
				$subcommand = DENON_API_Commands::MODEGAME;
			}
		elseif ($Value == "Pro Logic")
			{
				$subcommand = DENON_API_Commands::MODEPROLOGIC;
			}
		
		$payload = DENON_API_Commands::PSMODE.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Vertical Stretch
	public function VerticalStretch(boolean $Value) // VerticalStretch true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::VSTOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::VSTON;
			}
		$payload = DENON_API_Commands::VSVST.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Contrast
	public function Contrast(string $subcommand) // Contrast
	{
		$payload = DENON_API_Commands::PS.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Brightness
	public function Brightness(float $Value) //Brightness can be operated from 0 to 12 Step 0.5
	{
		$FunctionType = "Range0to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PVBR.$command;
		$this->SendCommand($payload);
	}
	
	//Chroma Level
	public function ChromaLevel(float $Value) //Chroma Level can be operated from -6 to 6 Step 0.5
	{
		$FunctionType = "Range6to6";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PVCM.$command;
		$this->SendCommand($payload);
	}
	
	//Digital Noise Reduction
	public function DigitalNoiseReduction(string $Value) // Digital Noise Reduction Off / Low / Middle / High 
	{
		if ($Value == "Off")
			{
				$subcommand = DENON_API_Commands::PVDNROFF;
			}
		elseif ($Value == "Low")
			{
				$subcommand = DENON_API_Commands::PVDNRLOW;
			}	
		elseif ($Value == "Middle")
			{
				$subcommand = DENON_API_Commands::PVDNRMID;
			}
		elseif ($Value == "High")
			{
				$subcommand = DENON_API_Commands::PVDNRHI;
			}
		
		$payload = DENON_API_Commands::PVDNR.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Enhancer
	public function Enhancer(float $Value) //Enhancer can be operated from 0 to 12 Step 0.5
	{
		$FunctionType = "Range0to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PVENH.$command;
		$this->SendCommand($payload);
	}
	
	//HDMI Monitor
	public function HDMIMonitor(string $Value) // HDMI Monitor Auto / Monitor 1 / Monitor 2 
	{
		if ($Value == "Auto")
			{
				$subcommand = DENON_API_Commands::VSMONIAUTO;
			}
		elseif ($Value == "Monitor 1")
			{
				$subcommand = DENON_API_Commands::VSMONI1;
			}	
		elseif ($Value == "Monitor 2")
			{
				$subcommand = DENON_API_Commands::VSMONI2;
			}
		
		$payload = DENON_API_Commands::VSMONI.$subcommand;
		$this->SendCommand($payload);
	}
	
	
	//Hue
	public function Hue(float $Value) //Enhancer can be operated from -6 to 6 Step 0.5
	{
		$FunctionType = "Range6to6";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PVHUE.$command;
		$this->SendCommand($payload);
	}
	
	//Resolution
	public function Resolution(string $Value) // Resolution 480p/576p / 1080i / 720p / 1080p / 1080p:24Hz / Auto / 4K / 4K(60/50)
	{
		if ($Value == "480p/576p")
			{
				$subcommand = DENON_API_Commands::SC48P;
			}
		elseif ($Value == "1080i")
			{
				$subcommand = DENON_API_Commands::SC10I;
			}	
		elseif ($Value == "720p")
			{
				$subcommand = DENON_API_Commands::SC72P;
			}
		elseif ($Value == "1080p")
			{
				$subcommand = DENON_API_Commands::SC10P;
			}
		elseif ($Value == "1080p:24Hz")
			{
				$subcommand = DENON_API_Commands::SC10P24;
			}
		elseif ($Value == "Auto")
			{
				$subcommand = DENON_API_Commands::SCAUTO;
			}
		elseif ($Value == "4K")
			{
				$subcommand = DENON_API_Commands::SC4K;
			}			
		elseif ($Value == "4K(60/50)")
			{
				$subcommand = DENON_API_Commands::SC4KF;
			}	
		
		$payload = DENON_API_Commands::VSSC.$subcommand;
		$this->SendCommand($payload);
	}
		
	//Resolution HDMI
	public function ResolutionHDMI(string $Value) //Resolution HDMI 480p/576p / 1080i / 720p / 1080p / 1080p:24Hz / Auto / 4K / 4K(60/50)
	{
		if ($Value == "480p/576p")
			{
				$subcommand = DENON_API_Commands::SCH48P;
			}
		elseif ($Value == "1080i")
			{
				$subcommand = DENON_API_Commands::SCH10I;
			}	
		elseif ($Value == "720p")
			{
				$subcommand = DENON_API_Commands::SCH72P;
			}
		elseif ($Value == "1080p")
			{
				$subcommand = DENON_API_Commands::SCH10P;
			}
		elseif ($Value == "1080p:24Hz")
			{
				$subcommand = DENON_API_Commands::SCH10P24;
			}
		elseif ($Value == "Auto")
			{
				$subcommand = DENON_API_Commands::SCHAUTO;
			}		
		elseif ($Value == "4K")
			{
				$subcommand = DENON_API_Commands::SCH4K;
			}			
		elseif ($Value == "4K(60/50)")
			{
				$subcommand = DENON_API_Commands::SCH4KF;
			}	
		
		$payload = DENON_API_Commands::VSSCH.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Video Processing Mode
	public function VideoProcessingMode(string $Value) // Video Processing Mode Auto / Monitor 1 / Monitor 2 
	{
		if ($Value == "Auto")
			{
				$subcommand = DENON_API_Commands::VSMONIAUTO;
			}
		elseif ($Value == "Monitor 1")
			{
				$subcommand = DENON_API_Commands::VSMONI1;
			}	
		elseif ($Value == "Monitor 2")
			{
				$subcommand = DENON_API_Commands::VSMONI2;
			}
		
		$payload = DENON_API_Commands::VSMONI.$subcommand;
		$this->SendCommand($payload);
	}
	
	//GUI Menu
	public function GUIMenu(boolean $Value) // GUI Menu true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::MNMENOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::MNMENON;
			}
		$payload = DENON_API_Commands::MNMEN.$subcommand;
		$this->SendCommand($payload);
	}
	
	//GUI Source Select Menu 
	public function GUISourceSelectMenu(boolean $Value) // GUI Source Select Menu true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::MNSRCOFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::MNSRCON;
			}
		$payload = DENON_API_Commands::MNSRC.$subcommand;
		$this->SendCommand($payload);
	}
	
	//PS
	public function ParameterSettings(string $subcommand) // PS
	{
		$payload = DENON_API_Commands::PS.$subcommand;
		$this->SendCommand($payload);
	}
	
		
	
	######################## Cursor Steuerung ######################################

	public function CursorUp()
	{
		$payload = DENON_API_Commands::MN.DENON_API_Commands::MNCUP;
		$this->SendCommand($payload);
	}

	public function CursorDown()
	{
		$payload = DENON_API_Commands::MN.DENON_API_Commands::MNCDN;
		$this->SendCommand($payload);
	}

	public function CursorLeft()
	{
		$payload = DENON_API_Commands::MN.DENON_API_Commands::MNCLT;
		$this->SendCommand($payload);
	}

	public function CursorRight()
	{
		$payload = DENON_API_Commands::MN.DENON_API_Commands::MNCRT;
		$this->SendCommand($payload);
	  CSCK_SendText($id, "MNCRT".chr(13));
	}

	public function Enter()
	{
		$payload = DENON_API_Commands::MN.DENON_API_Commands::MNENT;
		$this->SendCommand($payload);
	}

	public function CursorReturn()
	{
		$payload = DENON_API_Commands::MN.DENON_API_Commands::MNRTN;
		$this->SendCommand($payload);
	}
	
	//Levels
	
	//Bass Level	
	public function BassLevel(float $Value) // can be operated from -6 to +6, Step 0.5
	{
		$FunctionType = "Range6to6";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PS.DENON_API_Commands::PSBAS.$command;
		$this->SendCommand($payload);
	}
	
	//LFE Level
	public function LFELevel(float $Value) // can be operated from 0 to -10, Step 0.5
	{
		$FunctionType = "LFELevel";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PS.DENON_API_Commands::PSLFE.$command;
		$this->SendCommand($payload);
	}

	//Treble Level
	public function TrebleLevel(float $Value) // can be operated from -6 to +6, Step 0.5
	{
		$FunctionType = "Range6to6";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::PS.DENON_API_Commands::PSTRE.$command;
		$this->SendCommand($payload);
	}
	
	//Sleep
	public function SLEEP(integer $Value) // 0 ist aus bis 120 Step 10
	{
		if ($Value == 0)
		{
			$payload = DENON_API_Commands::SLP."OFF";
		}
		ELSE
		{
		$FunctionType = "Sleep";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::SLP.$command;
		}
		$this->SendCommand($payload);
	}
	
	//Network Audio Navigation
	public function NACursorUp()
	{
		$payload = DENON_API_Commands::NAUP;
		$this->SendCommand($payload);
	}

	public function NACursorDown()
	{
		$payload = DENON_API_Commands::NADOWN;
		$this->SendCommand($payload);
	}

	public function NACursorLeft()
	{
		$payload = DENON_API_Commands::NALEFT;
		$this->SendCommand($payload);
	}
	
	public function NACursorRight()
	{
		$payload = DENON_API_Commands::NARIGHT;
		$this->SendCommand($payload);
	}
	
	public function NAEnter()
	{
		$payload = DENON_API_Commands::NAENTER;
		$this->SendCommand($payload);
	}
	
	public function NAPlay()
	{
		$payload = DENON_API_Commands::NAPLAY;
		$this->SendCommand($payload);
	}
	
	public function NAPause()
	{
		$payload = DENON_API_Commands::NAPAUSE;
		$this->SendCommand($payload);
	}
	
	public function NAStop()
	{
		$payload = DENON_API_Commands::NASTOP;
		$this->SendCommand($payload);
	}
	
	public function NASkipPlus()
	{
		$payload = DENON_API_Commands::NASKIPPLUS;
		$this->SendCommand($payload);
	}
	
	public function NASkipMinus()
	{
		$payload = DENON_API_Commands::NASKIPMINUS;
		$this->SendCommand($payload);
	}
	
	public function NARepeatOne()
	{
		$payload = DENON_API_Commands::NAREPEATONE;
		$this->SendCommand($payload);
	}
	
	public function NARepeatAll()
	{
		$payload = DENON_API_Commands::NAREPEATALL;
		$this->SendCommand($payload);
	}
	
	public function NARepeatOff()
	{
		$payload = DENON_API_Commands::NAREPEATOFF;
		$this->SendCommand($payload);
	}
	
	public function NARandomOn()
	{
		$payload = DENON_API_Commands::NARANDOMON;
		$this->SendCommand($payload);
	}
	
	public function NARandomOff()
	{
		$payload = DENON_API_Commands::NARANDOMOFF;
		$this->SendCommand($payload);
	}
	
	public function NAPageNext()
	{
		$payload = DENON_API_Commands::NAPAGENEXT;
		$this->SendCommand($payload);
	}
	
	public function NAPagePrevious()
	{
		$payload = DENON_API_Commands::NAPAGEPREV;
		$this->SendCommand($payload);
	}
	######################## Zone 2 functions ######################################

	public function Z2_Volume(string $command) // "UP" or "DOWN"
	{
		$payload = DENON_API_Commands::Z2.$command;
		$this->SendCommand($payload);
	}

	public function Zone2VolumeFix(float $Value) // 18(db) bis -80(db), Step 0.5
	{
		$FunctionType = "Volume";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::Z2.$command;
		$this->SendCommand($payload);
	}

	//Zone2 Power 
	public function Zone2Power(boolean $Value) // Zone2 Power  true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::Z2OFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::Z2ON;
			}
		$payload = DENON_API_Commands::Z2.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Zone2 Mute 
	public function Zone2Mute(boolean $Value) // Zone2 Mute  true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::Z2OFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::Z2ON;
			}
		$payload = DENON_API_Commands::Z2MU.$subcommand;
		$this->SendCommand($payload);
	}
	
	public function Zone2InputSource(string $subcommand) // PHONO ; DVD ; HDP ; "TV/CBL" ; SAT ; "NET/USB" ; DVR ; TUNER
	{
		$payload = DENON_API_Commands::Z2.$subcommand;
		$this->SendCommand($payload);
	}

	//Channel Volume Front Left
	public function Zone2ChannelVolumeFL(float $volume) // -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::Z2CVFL.$command;
		$this->SendCommand($payload);
	}
	
	//Channel Volume Front Right
	public function Zone2ChannelVolumeFR(float $volume) // -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::Z2CVFR.$command;
		$this->SendCommand($payload);
	}
	
	public function Zone2ChannelSetting(string $Value) // Zone 2 Channel Setting: Stereo/Mono
	{
		if ($Value == "Stereo")
			{
				$subcommand = DENON_API_Commands::Z2CSST;
			}
		elseif ($Value == "Mono")
			{
				$subcommand = DENON_API_Commands::Z2CSMONO;
			}
		$payload = DENON_API_Commands::Z2CS.$subcommand;
		$this->SendCommand($payload);
	}

	public function Zone2QuickSelect($command) // Zone 2 Quickselect 1-5
	{
		$payload = DENON_API_Commands::Z2QUICK.$command;
		$this->SendCommand($payload);
	}

	

	########################## Zone 3 Functions ####################################

	public function Z3_Volume(string $command) // "UP" or "DOWN"
	{
		$payload = DENON_API_Commands::Z3.$command;
		$this->SendCommand($payload);
	}

	public function Zone3VolumeFix(float $Value) // 18(db) bis -80(db), Step 0.5
	{
		$FunctionType = "Volume";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::Z3.$command;
		$this->SendCommand($payload);
	}
	
	//Zone3 Power 
	public function Zone3Power(boolean $Value) // Zone3 Power  true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::Z3OFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::Z3ON;
			}
		$payload = DENON_API_Commands::Z3.$subcommand;
		$this->SendCommand($payload);
	}
	
	//Zone3 Mute 
	public function Zone3Mute(boolean $Value) // Zone3 Mute  true (On) or false (Off) 
	{
		if ($Value == false)
			{
				$subcommand = DENON_API_Commands::Z3OFF;
			}
		elseif ($Value == true)
			{
				$subcommand = DENON_API_Commands::Z3ON;
			}
		$payload = DENON_API_Commands::Z3MU.$subcommand;
		$this->SendCommand($payload);
	}
	

	public function Zone3InputSource(string $subcommand) // PHONO ; DVD ; HDP ; "TV/CBL" ; SAT ; "NET/USB" ; DVR
	{
		$payload = DENON_API_Commands::Z3.$subcommand;
		$this->SendCommand($payload);
	}

	public function Zone3ChannelSetting(string $Value) // Zone 3 Channel Setting: STEREO/MONO
	{
		if ($Value == "Stereo")
			{
				$subcommand = DENON_API_Commands::Z3CSST;
			}
		elseif ($Value == "Mono")
			{
				$subcommand = DENON_API_Commands::Z3CSMONO;
			}
		$payload = DENON_API_Commands::Z3CS.$subcommand;
		$this->SendCommand($payload);
	}

	public function Zone3QuickSelect(integer $command) // Zone 3 Quickselect 1-5
	{
	   $payload = DENON_API_Commands::Z3QUICK.$command;
		$this->SendCommand($payload);
	}

	public function Zone3ChannelVolumeFL(float $volume) // -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::Z3CVFR.$command;
		$this->SendCommand($payload);
	}

	public function Zone3ChannelVolumeFR(float $volume) // -12 to 12, Step 0.5 
	{
		$FunctionType = "Range12to12";
		$command = GetCommandValueSend($Value, $FunctionType);
		$payload = DENON_API_Commands::Z3CVFR.$command;
		$this->SendCommand($payload);
	}
	
	// Network Navigation
	
	
	
	
	// Get Value for Sending 
	protected function GetCommandValueSend($Value, $FunctionType)
	{
		//Sleep ***:001 to 120 by ASCII , 010=10min
		if($FunctionType == "Sleep")
		{
			$ValueMapping = array("OFF" => 0, "010" => 10, "020" => 20, "030" => 30, "040" => 40, "050" => 50, "060" => 60, "070" => 70, "080" => 80, "090" => 90, "100" => 100, "110" => 110, "120" => 120);

		}
		//Dimension **:00 to 06 by ASCII , 00=0, can be operated from 0 to 6
		if($FunctionType == "Dimension")
		{
			$ValueMapping = array(" 00" => 0, " 01" => 1, " 02" => 2, " 03" => 3, " 04" => 4, " 05" => 5, " 06" => 6);
		}
		//Master Volume
		if($FunctionType == "Volume")
		{
			$ValueMapping = array
							(
							"00" => -80,
							"005" => -79.5,
							"01" => -79,
							"015" => -78.5,
							"02" => -78,
							"025" => -77.5,
							"03" => -77,
							"035" => -76.5,
							"04" => -76,
							"045" => -75.5,
							"05" => -75,
							"055" => -74.5,
							"06" => -74,
							"065" => -73.5,
							"07" => -73,
							"075" => -72.5,
							"08" => -72,
							"085" => -71.5,
							"09" => -71,
							"095" => -70.5,
							"10" => -70,
							"105" => -69.5,
							"11" => -69,
							"115" => -68.5,
							"12" => -68,
							"125" => -67.5,
							"13" => -67,
							"135" => -66.5,
							"14" => -66,
							"145" => -65.5,
							"15" => -65,
							"155" => -64.5,
							"16" => -64,
							"165" => -63.5,
							"17" => -63,
							"175" => -62.5,
							"18" => -62,
							"185" => -61.5,
							"19" => -61,
							"195" => -60.5,
							"20" => -60,
							"205" => -59.5,
							"21" => -59,
							"215" => -58.5,
							"22" => -58,
							"225" => -57.5,
							"23" => -57,
							"235" => -56.5,
							"24" => -56,
							"245" => -55.5,
							"25" => -55,
							"255" => -54.5,
							"26" => -54,
							"265" => -53.5,
							"27" => -53,
							"275" => -52.5,
							"28" => -52,
							"285" => -51.5,
							"29" => -51,
							"295" => -50.5,
							"30" => -50,
							"305" => -49.5,
							"31" => -49,
							"315" => -48.5,
							"32" => -48,
							"325" => -47.5,
							"33" => -47,
							"335" => -46.5,
							"34" => -46,
							"345" => -45.5,
							"35" => -45,
							"355" => -44.5,
							"36" => -44,
							"365" => -43.5,
							"37" => -43,
							"375" => -42.5,
							"38" => -42,
							"385" => -41.5,
							"39" => -41,
							"395" => -40.5,
							"40" => -40,
							"405" => -39.5,
							"41" => -39,
							"415" => -38.5,
							"42" => -38,
							"425" => -37.5,
							"43" => -37,
							"435" => -36.5,
							"44" => -36,
							"445" => -35.5,
							"45" => -35,
							"455" => -34.5,
							"46" => -34,
							"465" => -33.5,
							"47" => -33,
							"475" => -32.5,
							"48" => -32,
							"485" => -31.5,
							"49" => -31,
							"495" => -30.5,
							"50" => -30,
							"505" => -29.5,
							"51" => -29,
							"515" => -28.5,
							"52" => -28,
							"525" => -27.5,
							"53" => -27,
							"535" => -26.5,
							"54" => -26,
							"545" => -25.5,
							"55" => -25,
							"555" => -24.5,
							"56" => -24,
							"565" => -23.5,
							"57" => -23,
							"575" => -22.5,
							"58" => -22,
							"585" => -21.5,
							"59" => -21,
							"595" => -20.5,
							"60" => -20,
							"605" => -19.5,
							"61" => -19,
							"615" => -18.5,
							"62" => -18,
							"625" => -17.5,
							"63" => -17,
							"635" => -16.5,
							"64" => -16,
							"645" => -15.5,
							"65" => -15,
							"655" => -14.5,
							"66" => -14,
							"665" => -13.5,
							"67" => -13,
							"675" => -12.5,
							"68" => -12,
							"685" => -11.5,
							"69" => -11,
							"695" => -10.5,
							"70" => -10,
							"705" => -9.5,
							"71" => -9,
							"715" => -8.5,
							"72" => -8,
							"725" => -7.5,
							"73" => -7,
							"735" => -6.5,
							"74" => -6,
							"745" => -5.5,
							"75" => -5,
							"755" => -4.5,
							"76" => -4,
							"765" => -3.5,
							"77" => -3,
							"775" => -2.5,
							"78" => -2,
							"785" => -1.5,
							"79" => -1,
							"795" => -0.5,
							"80" => 0,
							"805" => 0.5,
							"81" => 1,
							"815" => 1.5,
							"82" => 2,
							"825" => 2.5,
							"83" => 3,
							"835" => 3.5,
							"84" => 4,
							"845" => 4.5,
							"85" => 5,
							"855" => 5.5,
							"86" => 6,
							"865" => 6.5,
							"87" => 7,
							"875" => 7.5,
							"88" => 8,
							"885" => 8.5,
							"89" => 9,
							"895" => 9.5,
							"90" => 10,
							"905" => 10.5,
							"91" => 11,
							"915" => 11.5,
							"92" => 12,
							"925" => 12.5,
							"93" => 13,
							"935" => 13.5,
							"94" => 14,
							"945" => 14.5,
							"95" => 15,
							"955" => 15.5,
							"96" => 16,
							"965" => 16.5,
							"97" => 17,
							"975" => 17.5,
							"98" => 18
							);
		  
					
		}
		//Channel Volume **:38 to 62 by ASCII , 50=0dB, -12 to 12
		if($FunctionType == "Range12to12")
		{
			$ValueMapping = array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
													" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
													" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
													" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
													" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12);

			}
		//Audio Delay ***:000 to 300 by ASCII , 000=0ms, 300=300ms
		if($FunctionType == "AudioDelay")
		{
			$ValueMapping = array(" 000" => 0, " 001" => 1, " 002" => 2, " 003" => 3, " 004" => 4, " 005" => 5, " 006" => 6, " 007" => 7, " 008" => 8, " 009" => 9, " 010" => 10, " 011" => 11, " 012" => 12,
							" 013" => 13, " 014" => 14, " 015" => 15, " 016" => 16, " 017" => 17, " 018" => 18, " 019" => 19, " 020" => 20, " 021" => 21, " 022" => 22, " 023" => 23, " 024" => 24, " 025" => 25, " 026" => 26,
							" 027" => 27, " 028" => 28, " 029" => 29, " 030" => 30, " 031" => 31, " 032" => 32, " 033" => 33, " 034" => 34, " 035" => 35, " 036" => 36, " 037" => 37, " 038" => 38, " 039" => 39, " 040" => 40,
							" 041" => 41, " 042" => 42,	" 043" => 43, " 044" => 44,	" 045" => 45, " 046" => 46,	" 047" => 47, " 048" => 48,	" 049" => 49, " 050" => 50,	" 051" => 51, " 052" => 52,	" 053" => 53, " 054" => 54,
						    " 055" => 55, " 056" => 56,	" 057" => 57, " 058" => 58, " 059" => 59, " 060" => 60,	" 061" => 61, " 062" => 62,	" 063" => 63, " 064" => 64,	" 065" => 65, " 066" => 66,	" 067" => 67, " 068" => 68,
						" 069" => 69,
						" 070" => 70,
						" 071" => 71,
						" 072" => 72,
						" 073" => 73,
						" 074" => 74,
						" 075" => 75,
						" 076" => 76,
						" 077" => 77,
						" 078" => 78,
						" 079" => 79,
						" 080" => 80,
						" 081" => 81,
						" 082" => 82,
						" 083" => 83,
						" 084" => 84,
						" 085" => 85,
						" 086" => 86,
						" 087" => 87,
						" 088" => 88,
						" 089" => 89,
						" 090" => 90,
						" 091" => 91,
						" 092" => 92,
						" 093" => 93,
						" 094" => 94,
						" 095" => 95,
						" 096" => 96,
						" 097" => 97,
						" 098" => 98,
						" 099" => 99,
						" 100" => 100,
						" 101" => 101,
						" 102" => 102,
						" 103" => 103,
						" 104" => 104,
						" 105" => 105,
						" 106" => 106,
						" 107" => 107,
						" 108" => 108,
						" 109" => 109,
						" 110" => 110,
						" 111" => 111,
						" 112" => 112,
						" 113" => 113,
						" 114" => 114,
						" 115" => 115,
						" 116" => 116,
						" 117" => 117,
						" 118" => 118,
						" 119" => 119,
						" 120" => 120,
						" 121" => 121,
						" 122" => 122,
						" 123" => 123,
						" 124" => 124,
						" 125" => 125,
						" 126" => 126,
						" 127" => 127,
						" 128" => 128,
						" 129" => 129,
						" 130" => 130,
						" 131" => 131,
						" 132" => 132,
						" 133" => 133,
						" 134" => 134,
						" 135" => 135,
						" 136" => 136,
						" 137" => 137,
						" 138" => 138,
						" 139" => 139,
						" 140" => 140,
						" 141" => 141,
						" 142" => 142,
						" 143" => 143,
						" 144" => 144,
						" 145" => 145,
						" 146" => 146,
						" 147" => 147,
						" 148" => 148,
						" 149" => 149,
						" 150" => 150,
						" 151" => 151,
						" 152" => 152,
						" 153" => 153,
						" 154" => 154,
						" 155" => 155,
						" 156" => 156,
						" 157" => 157,
						" 158" => 158,
						" 159" => 159,
						" 160" => 160,
						" 161" => 161,
						" 162" => 162,
						" 163" => 163,
						" 164" => 164,
						" 165" => 165,
						" 166" => 166,
						" 167" => 167,
						" 168" => 168,
						" 169" => 169,
						" 170" => 170,
						" 171" => 171,
						" 172" => 172,
						" 173" => 173,
						" 174" => 174,
						" 175" => 175,
						" 176" => 176,
						" 177" => 177,
						" 178" => 178,
						" 179" => 179,
						" 180" => 180,
						" 181" => 181,
						" 182" => 182,
						" 183" => 183,
						" 184" => 184,
						" 185" => 185,
						" 186" => 186,
						" 187" => 187,
						" 188" => 188,
						" 189" => 189,
						" 190" => 190,
						" 191" => 191,
						" 192" => 192,
						" 193" => 193,
						" 194" => 194,
						" 195" => 195,
						" 196" => 196,
						" 197" => 197,
						" 198" => 198,
						" 199" => 199,
						" 200" => 200,
						" 201" => 201,
						" 202" => 202,
						" 203" => 203,
						" 204" => 204,
						" 205" => 205,
						" 206" => 206,
						" 207" => 207,
						" 208" => 208,
						" 209" => 209,
						" 210" => 210,
						" 211" => 211,
						" 212" => 212,
						" 213" => 213,
						" 214" => 214,
						" 215" => 215,
						" 216" => 216,
						" 217" => 217,
						" 218" => 218,
						" 219" => 219,
						" 220" => 220,
						" 221" => 221,
						" 222" => 222,
						" 223" => 223,
						" 224" => 224,
						" 225" => 225,
						" 226" => 226,
						" 227" => 227,
						" 228" => 228,
						" 229" => 229,
						" 230" => 230,
						" 231" => 231,
						" 232" => 232,
						" 233" => 233,
						" 234" => 234,
						" 235" => 235,
						" 236" => 236,
						" 237" => 237,
						" 238" => 238,
						" 239" => 239,
						" 240" => 240,
						" 241" => 241,
						" 242" => 242,
						" 243" => 243,
						" 244" => 244,
						" 245" => 245,
						" 246" => 246,
						" 247" => 247,
						" 248" => 248,
						" 249" => 249,
						" 250" => 250,
						" 251" => 251,
						" 252" => 252,
						" 253" => 253,
						" 254" => 254,
						" 255" => 255,
						" 256" => 256,
						" 257" => 257,
						" 258" => 258,
						" 259" => 259,
						" 260" => 260,
						" 261" => 261,
						" 262" => 262,
						" 263" => 263,
						" 264" => 264,
						" 265" => 265,
						" 266" => 266,
						" 267" => 267,
						" 268" => 268,
						" 269" => 269,
						" 270" => 270,
						" 271" => 271,
						" 272" => 272,
						" 273" => 273,
						" 274" => 274,
						" 275" => 275,
						" 276" => 276,
						" 277" => 277,
						" 278" => 278,
						" 279" => 279,
						" 280" => 280,
						" 281" => 281,
						" 282" => 282,
						" 283" => 283,
						" 284" => 284,
						" 285" => 285,
						" 286" => 286,
						" 287" => 287,
						" 288" => 288,
						" 289" => 289,
						" 290" => 290,
						" 291" => 291,
						" 292" => 292,
						" 293" => 293,
						" 294" => 294,
						" 295" => 295,
						" 296" => 296,
						" 297" => 297,
						" 298" => 298,
						" 299" => 299,
						" 300" => 300);
		}
		//LFELevel **:00 to 10 by ASCII , 00=0dB, 10=-10dB
		if($FunctionType == "LFELevel")
		{
			$ValueMapping = array(" 00" => 0, " 005" => -0.5, " 01" => -1, " 015" => -1.5, " 02" => -2, " 025" => -2.5, " 03" => -3, " 035" => -3.5, " 04" => -4, " 045" => -4.5,
													" 05" => -5, " 055" => -5.5, " 06" => -6, " 065" => -6.5, " 07" => -7, " 075" => -7.5, " 08" => -8, " 085" => -8.5, " 09" => -9, " 095" => -9.5,
													" 10" => 10);
		}
		//Level **:44 to 56 by ASCII , 50=0dB  from -6 to +6
		if($FunctionType == "Range6to6")
		{
			$ValueMapping = array(" 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
													" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
													" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6);
		}
		//Center Width **:00 to 07 by ASCII , 00=0 can be operated from 0 to 7
		if($FunctionType == "CenterWidth")
		{
			$ValueMapping = array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
													" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7);
		}
		//Effect Level **:00 to 15 by ASCII , 00=0dB, 10=10dB can be operated from 1 to 15
		if($FunctionType == "EffectLevel")
		{
			$ValueMapping = array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
													" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7, " 075" => 7.5, " 08" => 8, " 085" => 8.5, " 09" => 9, " 095" => 9.5,
													" 10" => 10, " 105" => 10.5, " 11" => 11, " 115" => 11.5, " 12" => 12, " 125" => 12.5, " 13" => 13, " 135" => 13.5, " 14" => 14, " 145" => 14.5, " 15" => 15);
		}
		 //Center Image **:00 to 10 by ASCII , 00=0.0 can be operated from 0.0 to 1.0
		if($FunctionType == "CenterImage")
		{
			$ValueMapping = array(" 00" => 0, " 01" => 0.1, " 02" => 0.2, " 03" => 0.3, " 04" => 0.4, " 05" => 0.5, " 06" => 0.6, " 07" => 0.7, " 08" => 0.8, " 09" => 0.9, " 10" => 1.0);
		}
		//Range **:00 to 12 by ASCII , 00=0 can be operated from 0 to 12
		if($FunctionType == "Range0to12")
		{
			$ValueMapping = array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
													" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7, " 075" => 7.5, " 08" => 8, " 085" => 8.5, " 09" => 9, " 095" => 9.5,
													" 10" => 10, " 105" => 10.5, " 11" => 11, " 115" => 11.5, " 12" => 12);
		}
		//Range **:40 to 60 by ASCII , 50=0dB can be operated from -10 to +10
		if($FunctionType == "Range10to10")
		{
			$ValueMapping = array(" 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5, " 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5,
													" 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5, " 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5,
													" 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5, " 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5,
													" 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8, " 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10);
		}
		foreach ($ValueMapping as $command => $UserValue)
			{
				if ($UserValue == $Value)
				{
					$denoncommand = $command;
				}
			}
		return $denoncommand;
	}
	
	
	
	############################ NEO Toggle Workarround ##############################################
	
	public function NEOToggle($ObjektID)
	{
		$Ident = IPS_GetObject ($ObjektID)["ObjectIdent"];
		$InstanzID = IPS_GetParent($ObjektID);
		$ParentID = IPS_GetParent($InstanzID);
		$InstanzName = IPS_GetName($InstanzID);
		$Name = IPS_GetName($ObjektID);
		$KatID = $this->ReadPropertyInteger('NEOToggleCategoryID');
		$ScriptName = $InstanzName." ".$Name."_toggle";
		$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
		if ($Ident == "PW")
		{
			if ($SkriptID === false)
			{
            	$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Power('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Power einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Power('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Standby schalten" );
	}

?>';
				$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
				return $ScriptID;
			}
		}
		
		if ($Ident == "ZM")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_MainZonePower('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "MainZonePower einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_MainZonePower('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "MainZonePower ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "MU")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_MainMute('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Mute einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_MainMute('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Mute ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "Z2POWER")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Zone2Power('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Zone2Power einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Zone2Power('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Zone2Power ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "Z3POWER")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Zone3Power('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Zone3Power einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Zone3Power('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Zone3Power ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "Z2MU")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Zone2Mute('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Zone 2 Mute einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Zone2Mute('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Zone 2 Mute ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "Z3MU")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Zone3Mute('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Zone 3 Mute einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Zone3Mute('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Zone 3 Mute ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSDOLVOL")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_DolbyVolume('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Dolby Volume einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_DolbyVolume('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Dolby Volume ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSCINEMA_EQ")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_CinemaEQ('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "CinemaEQ einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_CinemaEQ('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "CinemaEQ ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSPAN")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Panorama('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Panorama einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Panorama('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Panorama ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSDYNEQ")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_DynamicEQ('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "DynamicEQ einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_DynamicEQ('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "DynamicEQ ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSSWR")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Subwoofer('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Subwoofer einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Subwoofer('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Subwoofer ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSATT")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_SubwooferATT('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "SubwooferATT einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_SubwooferATT('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "SubwooferATT ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSFH")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_FrontHeight('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "FrontHeight einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_FrontHeight('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "FrontHeight ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSTONE_CTRL")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_ToneCTRL('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "ToneCTRL einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_ToneCTRL('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "ToneCTRL ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSAFD")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_AutoFlagDetectMode('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Auto Flag Detect Mode einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_AutoFlagDetectMode('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Auto Flag Detect Mode ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "PSEFF_O")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_Effect('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Effect einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_Effect('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Effect ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "VSVST")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_VerticalStretch('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "Vertical Stretch einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_VerticalStretch('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "Vertical Stretch ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "MNMEN")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_GUIMenu('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "GUI Menu einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_GUIMenu('.$InstanzID.', false);
   IPS_LogMessage( "Denon Telnet AVR" , "GUI Menu ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
		
		if ($Ident == "MNSRC")
		{
			$SkriptID = @IPS_GetScriptIDByName($ScriptName, $KatID);
			if ($SkriptID === false)
			{
				$Content = '
<?
$status = GetValueBoolean('.$ObjektID.'); // Status des Ger�ts auslesen
if ($status == false)// Einschalten
	{
	DAVRT_GUISourceSelectMenu('.$InstanzID.', true);
	IPS_LogMessage( "Denon Telnet AVR" , "GUI Source Select Menu einschalten" );
   }
elseif ($status == true)// Ausschalten
	{
   DAVRT_GUISourceSelectMenu('.$InstanzID.', false);
   IPS_LogMessage("Denon Telnet AVR", "GUI Source Select Menu ausschalten" );
	}

?>';
			$ScriptID = $this->WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content);
			return $ScriptID;
			}
		}
	}
	
	protected function WriteNEOToggle($ScriptName, $KatID, $ObjektID, $InstanzID, $Content)
	{
		$ScriptID = IPS_CreateScript(0);
		IPS_SetName($ScriptID, $ScriptName);
		IPS_SetParent($ScriptID, $KatID);
		IPS_SetScriptContent($ScriptID, $Content);
		return $ScriptID;
	}
		
	################## SEMAPHOREN Helper  - private

    private function lock($ident)
    {
        for ($i = 0; $i < 3000; $i++)
        {
            if (IPS_SemaphoreEnter("DENONAVRT_" . (string) $this->InstanceID . (string) $ident, 1))
            {
                return true;
            }
            else
            {
                IPS_Sleep(mt_rand(1, 5));
            }
        }
        return false;
    }

    private function unlock($ident)
    {
          IPS_SemaphoreLeave("DENONAVRT_" . (string) $this->InstanceID . (string) $ident);
    }
	

}

?>