<?

//  API Datentypen
class DENONIPSVarType extends stdClass
{

    const vtNone = -1;
    const vtBoolean = 0;
    const vtInteger = 1;
    const vtFloat = 2;
    const vtString = 3;
    

}

class DENONIPSProfiles extends stdClass
{
	//Name übergeben
	// function  IM Array auf übereinstimmnung überprüfen match ausgeben
	// function create profile mit übergabewert aus array aufruf der neuen klasse var zu setzten der var mit übergabe des profilnames ( am besten in einer klasse zusammenführen)
	
	//public $description;
	public $Type;
	public $Zone;
	const DENON = "DENON";
	
	//Profiltype
	const ptSwitch = '~Switch';
    public $ptPower;
	public $ptMainZonePower;
	public $ptMainMute;
	public $ptCinemaEQ;
	public $ptPanorama;
	public $ptFrontHeight;
	public $ptToneCTRL;
	public $ptDynamicEQ;
	public $ptMasterVolume;
	public $ptInputSource;
	public $ptAudioDelay;
	public $ptLFELevel;
	public $ptQuickSelect;
	public $ptSleep;
	public $ptDigitalInputMode;
	public $ptSurroundMode;
	public $ptSurroundPlayMode;
	public $ptMultiEQMode;
	public $ptAudioRestorer;
	public $ptBassLevel;
	public $ptTrebleLevel;
	public $ptDimension;
	public $ptDynamicVolume;
	public $ptRoomSize;
	public $ptDynamicCompressor;
	public $ptCenterWidth;
	public $ptDynamicRange;
	public $ptVideoSelect;
	public $ptSurroundBackMode;
	public $ptPreset;
	public $ptInputMode;
	public $ptZone2Power;
	public $ptZone2Mute;
	public $ptZone2HPF;
	public $ptZone2Volume;
	public $ptZone2InputSource;
	public $ptZone2ChannelSetting;
	public $ptZone2ChannelVolumeFL;
	public $ptZone2ChannelVolumeFR;
	public $ptZone2QuickSelect;
	public $ptZone2Sleep;
	public $ptZone3Power;
	public $ptZone3Mute;
	public $ptZone3HPF;
	public $ptZone3Volume;
	public $ptZone3InputSource;
	public $ptZone3ChannelSetting;
	public $ptZone3ChannelVolumeFL;
	public $ptZone3ChannelVolumeFR;
	public $ptZone3QuickSelect;
	public $ptZone3Sleep;
	public $ptChannelVolumeFL;
	public $ptChannelVolumeFR;
	public $ptChannelVolumeC;
	public $ptChannelVolumeSW;
	public $ptChannelVolumeSW2;
	public $ptChannelVolumeSL;
	public $ptChannelVolumeSR;
	public $ptChannelVolumeSBL;
	public $ptChannelVolumeSBR;
	public $ptChannelVolumeSB;
	public $ptChannelVolumeFHL;
	public $ptChannelVolumeFHR;
	public $ptChannelVolumeFWL;
	public $ptChannelVolumeFWR;
	public $ptNavigation;
	public $ptContrast;
	public $ptBrightness;
	public $ptChromalevel;
	public $ptHue;
	public $ptEnhancer;
	public $ptSubwoofer;
	public $ptSubwooferATT;
	public $ptDNRDirectChange;
	public $ptEffect;
	public $ptAFDM;
	public $ptEffectLevel;
	public $ptCenterImage;
	public $ptStageWidth;
	public $ptStageHeight;
	public $ptAudysseyDSX;
	public $ptReferenceLevel;
	public $ptDRCDirectChange;
	public $ptSpeakerOutputFront;
	public $ptDCOMPDirectChange;
	public $ptHDMIMonitor;
	public $ptASP;
	public $ptResolution;
	public $ptResolutionHDMI;
	public $ptHDMIAudioOutput;
	public $ptVideoProcessingMode;
	public $ptDolbyVolumeLeveler;
	public $ptDolbyVolumeModeler;
	public $ptPLIIZHeightGain;
	public $ptVerticalStretch;
	public $ptDolbyVolume;
	public $ptFriendlyName;
	public $ptMainZoneName;
	public $ptZone2Name;
	public $ptZone3Name;
	public $ptTopMenuLink;
	public $ptModel;
	public $UsedInputSources;
	public $UsedInputSourcesZ2;
	public $UsedInputSourcesZ3;
	public $DenonIP;
	
	public function GetInputSources(integer $Zone)
	{
		if ($Zone == 0) // MainZone
		{
			$xmlMainZone = new SimpleXMLElement(file_get_contents("http://".$this->DenonIP."/goform/formMainZone_MainZoneXml.xml"));
			if ($xmlMainZone)
				{
				$Inputsources = $this->ReadInputSources($Zone, $xmlMainZone);
				return $Inputsources;
				}
			else
				{
				exit("Datei ".$xmlMainZone." konnte nicht geöffnet werden.");
				}
		}		
		elseif ($Zone == 1) // Zone 2
		{
			$data = array();
			$xmlZone2 = new SimpleXMLElement(file_get_contents("http://".$this->DenonIP."/goform/formMainZone_MainZoneXml.xml?_=&ZoneName=ZONE2"));
			if ($xmlZone2)
					{
					$InputsourcesZ2 = $this->ReadInputSources($Zone, $xmlZone2);
					return $InputsourcesZ2;	
					}
				else
					{
					exit("Datei ".$xml." konnte nicht geöffnet werden.");
					}
			return $data; 		
		}
		elseif ($Zone == 2) // Zone 3
		{
			$data = array();
			$xmlZone3 = new SimpleXMLElement(file_get_contents("http://".$this->DenonIP."/goform/formMainZone_MainZoneXml.xml?_=&ZoneName=ZONE3"));
			if ($xmlZone3)
					{
					$InputsourcesZ3 = $this->ReadInputSources($Zone, $xmlZone3);
					return $InputsourcesZ3;
					}
				else
					{
					exit("Datei ".$xml." konnte nicht geöffnet werden.");
					}
			return $data;
		}	
	}

	protected function ReadInputSources($Zone, $xml)
	{
		//Inputs
		$InputFuncList = $xml->xpath('.//InputFuncList');
		if ($InputFuncList)
		{
			$countinput = count($InputFuncList[0]->value);
			$RenameSource = $xml->xpath('.//RenameSource');
			$SourceDelete = $xml->xpath('.//SourceDelete');
			$SourceDeleteUse = $xml->xpath('.//SourceDelete/value[. ="USE"]');
			$countUse = count($SourceDeleteUse);
			$Inputs = array();

			for ($i = 0; $i <= $countinput-1; $i++)
				{
					if ((string)$SourceDelete[0]->value[$i] == "USE")
					{
						if ((string)$RenameSource[0]->value[$i] != "")
							{
							$Inputs[$i] = (string)$RenameSource[0]->value[$i];
							}
						else
							{
							$Inputs[$i] = (string)$InputFuncList[0]->value[$i];
						   }
					}
			   }
		}
		$MaxValue = ($countUse-1);
		
		if($Zone == 0)
		{
			$UsedInputSources = array
			(
			"Ident" => DENON_API_Commands::SI,
			"Name" => "Input Source",
			"Profilesettings" => Array("Database", "", "", 0, $MaxValue, 0, 0),
			);
			$Associations = array();
			foreach ($Inputs as $Value => $Input)
			{
			$Input = str_replace(" ", "", $Input);
			$Associations[] = array(($Value-1), $Input,  "", -1);
			}
			$UsedInputSources["Associations"] = $Associations;
			
			$this->UsedInputSources = $UsedInputSources;
			return $UsedInputSources;
		}
		elseif($Zone == 1)
		{
			$UsedInputSourcesZ2 = array
			(
			"Ident" => DENON_API_Commands::Z2INPUT,
			"Name" => "Zone 2 Input Source",
			"Profilesettings" => Array("Database", "", "", 0, $MaxValue, 0, 0),
			);
			$AssociationsZ2 = array();
			foreach ($Inputs as $Value => $Input)
			{
			$Input = str_replace(" ", "", $Input);
			$AssociationsZ2[] = array(($Value-1), $Input,  "", -1);
			}
			$UsedInputSourcesZ2["Associations"] = $AssociationsZ2;
			
			$this->UsedInputSourcesZ2 = $UsedInputSourcesZ2;
			return $UsedInputSourcesZ2;
		}
		elseif($Zone == 2)
		{
			$UsedInputSourcesZ3 = array
			(
			"Ident" => DENON_API_Commands::Z3INPUT,
			"Name" => "Zone 3 Input Source",
			"Profilesettings" => Array("Database", "", "", 0, $MaxValue, 0, 0),
			);
			$AssociationsZ3 = array();
			foreach ($Inputs as $Value => $Input)
			{
			$Input = str_replace(" ", "", $Input);
			$AssociationsZ3[] = array(($Value-1), $Input,  "", -1);
			}
			$UsedInputSourcesZ3["Associations"] = $AssociationsZ3;
			
			$this->UsedInputSourcesZ3 = $UsedInputSourcesZ3;
			return $UsedInputSourcesZ3;
		}
	}	

	public function SetupVarDenonString($profile)
	{
		//Ident, Name, Profile, Position 
		$profilesMainZone = array (
		$this->ptFriendlyName => array("FriendlyName", "Name Denon AVR", "~String", $this->getpos($profile)),
		$this->ptMainZoneName => array("MainZoneName", "MainZone Name", "~String", $this->getpos($profile)),
		$this->ptTopMenuLink => array("TopMenuLink", "Top Menu Link", "~String", $this->getpos($profile)),
		$this->ptModel => array("Model", "Model", "~String", $this->getpos($profile))
		);
		$profilesZone2 = array (
		$this->ptZone2Name => array("Zone2Name", "Zone2 Name", "~String", $this->getpos($profile)),
		$this->ptModel => array("Model", "Model", "~String", $this->getpos($profile))
		);
		$profilesZone3 = array (
		$this->ptZone3Name => array("Zone3Name", "Zone3 Name", "~String", $this->getpos($profile)),
		$this->ptModel => array("Model", "Model", "~String", $this->getpos($profile))
		);

		if($this->Zone == 0)
		{
			$profilestring = $this->sendprofilestring($profilesMainZone, $profile);
			return $profilestring;
		}
		elseif ($this->Zone == 1)
		{
			$profilestring = $this->sendprofilestring($profilesZone2, $profile);
			return $profilestring;
		}
		elseif ($this->Zone == 2)
		{
			$profilestring = $this->sendprofilestring($profilesZone3, $profile);
			return $profilestring;
		}	
	}
	
	private function sendprofilestring($profiles, $profile)
	{
		foreach($profiles as $ptName => $profilvar)
		{
			if($ptName == $profile)
			{
			   $profilestring = array(
			   "Name" => $profilvar[1],
			   "Ident" => $profilvar[0],
			   "ProfilName" => $profilvar[2],
			   "Position" => $profilvar[3]
			   );
			   
			   return $profilestring;
			}
		}	
	}
	
	public function SetupVarDenonBool($profile)
	{
		//Ident, Name, Profile, Position 
		$profilesMainZone = array (
		$this->ptPower => array(DENON_API_Commands::PW, "Power", "~Switch", $this->getpos($profile)),
		$this->ptMainZonePower => array(DENON_API_Commands::ZM, "MainZone Power", "~Switch", $this->getpos($profile)),
		$this->ptMainMute => array(DENON_API_Commands::MU, "Main Mute", "~Switch", $this->getpos($profile)),
		$this->ptCinemaEQ => array(DENON_API_Commands::PSCINEMAEQ, "Cinema EQ", "~Switch", $this->getpos($profile)),
		$this->ptDynamicEQ => array(DENON_API_Commands::PSDYNEQ, "Dynamic EQ", "~Switch", $this->getpos($profile)),
		$this->ptFrontHeight => array(DENON_API_Commands::PSFH, "Front Height", "~Switch", $this->getpos($profile)),
		$this->ptPanorama => array(DENON_API_Commands::PSPAN, "Panorama", "~Switch", $this->getpos($profile)),
		$this->ptToneCTRL => array(DENON_API_Commands::PSTONE, "Tone CTRL", "~Switch", $this->getpos($profile)),
		$this->ptVerticalStretch => array(DENON_API_Commands::VSVST, "Vertical Stretch", "~Switch", $this->getpos($profile)),
		$this->ptDolbyVolume => array(DENON_API_Commands::PSDOLVOL, "Dolby Volume", "~Switch", $this->getpos($profile)),
		$this->ptEffect => array(DENON_API_Commands::PSEFF, "Effect", "~Switch", $this->getpos($profile)),
		$this->ptAFDM => array(DENON_API_Commands::PSAFD, "AFDM", "~Switch", $this->getpos($profile)),
		$this->ptSubwoofer => array(DENON_API_Commands::PSSWR, "Subwoofer", "~Switch", $this->getpos($profile)),
		$this->ptSubwooferATT => array(DENON_API_Commands::PSATT, "Subwoofer ATT", "~Switch", $this->getpos($profile))
		);
		
		$profilesZone2 = array (
		$this->ptPower => array(DENON_API_Commands::PW, "Power", "~Switch", $this->getpos($profile)),
		$this->ptZone2Power => array(DENON_API_Commands::Z2POWER, "Zone 2 Power", "~Switch", $this->getpos($profile)),
		$this->ptZone2Mute => array(DENON_API_Commands::Z2MU, "Zone 2 Mute", "~Switch", $this->getpos($profile)),
		$this->ptZone2HPF => array(DENON_API_Commands::Z2HPF, "Zone 2 HPF", "~Switch", $this->getpos($profile))
		);
		
		$profilesZone3 = array (
		$this->ptPower => array(DENON_API_Commands::PW, "Power", "~Switch", $this->getpos($profile)),
		$this->ptZone3Power => array(DENON_API_Commands::Z3POWER, "Zone 3 Power", "~Switch", $this->getpos($profile)),
		$this->ptZone3Mute => array(DENON_API_Commands::Z3MU, "Zone 3 Mute", "~Switch", $this->getpos($profile)),
		$this->ptZone3HPF => array(DENON_API_Commands::Z3HPF, "Zone 3 HPF", "~Switch", $this->getpos($profile))
		);
		
		if($this->Zone == 0)
		{
			$profilebool = $this->sendprofilebool($profilesMainZone, $profile);
			return $profilebool;
		}
		elseif ($this->Zone == 1)
		{
			$profilebool = $this->sendprofilebool($profilesZone2, $profile);
			return $profilebool;
		}
		elseif ($this->Zone == 2)
		{
			$profilebool = $this->sendprofilebool($profilesZone3, $profile);
			return $profilebool;
		}
		
	}
	
	private function sendprofilebool($profiles, $profile)
	{
		foreach($profiles as $ptName => $profilvar)
		{
			if($ptName == $profile)
			{
			   $profilebool = array(
			   "Name" => $profilvar[1],
			   "Ident" => $profilvar[0],
			   "ProfilName" => $profilvar[2],
			   "Position" => $profilvar[3]
			   );
			   
			   return $profilebool;
			}

		}	
	}
	
	public function SetupVarDenonInteger($profile)
	{
		//Sichtbare variablen profil suchen
		$profilesMainZone = array(
        $this->ptSleep => array(DENON_API_Commands::SLP, "Sleep", "Intensity",  "", " Min", 0, 120, 10, 0),
		$this->ptDimension => array(DENON_API_Commands::PSDIM, "Dimension", "Intensity",  "", "", 0, 6, 1, 0)
		);
		
		$profilesZone2 = array(
        $this->ptZone2Sleep => array(DENON_API_Commands::Z2SLP, "Sleep Zone 2", "Intensity",  "", " Min", 0, 120, 10, 0)
		);
		
		$profilesZone3 = array(
        $this->ptZone3Sleep => array(DENON_API_Commands::Z3SLP, "Sleep Zone 3", "Intensity",  "", " Min", 0, 120, 10, 0)
		);
		
		if($this->Zone == 0)
		{
			$profileinteger = $this->sendprofileinteger($profilesMainZone, $profile);
			return $profileinteger;
		}
		elseif ($this->Zone == 1)
		{
			$profileinteger = $this->sendprofileinteger($profilesZone2, $profile);
			return $profileinteger;
		}
		elseif ($this->Zone == 2)
		{
			$profileinteger = $this->sendprofileinteger($profilesZone3, $profile);
			return $profileinteger;
		}
		
	}
	
	private function sendprofileinteger($profiles, $profile)
	{
		foreach($profiles as $ptName => $profilvar)
		{
			if($ptName == $profile)
			{
				$pos = $this->getpos($profile);
				$profileinteger = array(
				"ProfilName" => $ptName,
				"Name" => $profilvar[1],
				"Ident" => $profilvar[0],
				"Icon" => $profilvar[2],
				"Prefix" => $profilvar[3],
				"Suffix" => $profilvar[4],
				"MinValue" => $profilvar[5],
				"MaxValue" => $profilvar[6],
				"Stepsize" => $profilvar[7],
				"Digits" => $profilvar[8],
				"Position" => $pos
				);
			   
			   return $profileinteger;
			}

		}	
	}
	
	public function SetupVarDenonIntegerAss($profile)
	{
				
		//Sichtbare variablen profil suchen
		//Associations
		//Associations Value, Association, Icon, Color

		$ProfilAssociationsMainZone = array
		(
			$this->ptNavigation => array(
				"Ident" => DENON_API_Commands::MN,
				"Name" => "Navigation",
				"Profilesettings" => Array("Move", "", "", 0, 5, 0, 0),
				"Associations" => array(
				Array(0, "Left",  "", -1),
				Array(1, "Down",  "", -1),
				Array(2, "Up",  "", -1),
				Array(3, "Right",  "", -1),
				Array(4, "Enter",  "", -1),
				Array(5, "Return",  "", -1)
				)		
			),
			$this->ptQuickSelect => array(
				"Ident" => DENON_API_Commands::MSQUICK,
				"Name" => "Quick Select",
				"Profilesettings" => Array("Intensity", "", "", 0, 5, 0, 0),
				"Associations" => array(
				Array(0, "NONE",  "", -1),
				Array(1, "QS 1",  "", -1),
				Array(2, "QS 2",  "", -1),
				Array(3, "QS 3",  "", -1),
				Array(4, "QS 4",  "", -1),
				Array(5, "QS 5",  "", -1)
				)
			),
			$this->ptDigitalInputMode => array(
				"Ident" => DENON_API_Commands::DC,
				"Name" => "Input Mode",
				"Profilesettings" => Array("Intensity", "", "", 0, 2, 0, 0),
				"Associations" => Array(
				Array(0, "Auto",  "", -1),
				Array(1, "PCM",  "", -1),
				Array(2, "DTS",  "", -1)
				)
			),
			$this->ptSurroundMode => array(
				"Ident" => DENON_API_Commands::MS,
				"Name" => "Surround Mode",
				"Profilesettings" => Array("Database", "", "", 0, 15, 0, 0),
				"Associations" => Array(
				Array(0, "Direct",  "", -1),
				Array(1, "Pure Direct",  "", -1),
				Array(2, "Stereo",  "", -1),
				Array(3, "Standard",  "", -1),
				Array(4, "Dolby Digital",  "", -1),
				Array(5, "DTS Surround",  "", -1),
				Array(6, "Multichannel Stereo",  "", -1),
				Array(7, "Widescreen",  "", -1),
				Array(8, "Superstadium",  "", -1),
				Array(9, "Rock Arena",  "", -1),
				Array(10, "Jazz Club",  "", -1),
				Array(11, "Classic Concert",  "", -1),
				Array(12, "Mono Movie",  "", -1),
				Array(13, "Matrix",  "", -1),
				Array(14, "Video Game",  "", -1),
				Array(15, "Virtual",  "", -1)
				)
			),
			$this->ptSurroundPlayMode => array(
				"Ident" => DENON_API_Commands::PSMODE,
				"Name" => "Surround PlayMode",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "Cinema",  "", -1),
				Array(1, "Music",  "", -1),
				Array(2, "Game",  "", -1),
				Array(3, "Pro Logic",  "", -1)
				)
			),
			$this->ptMultiEQMode => array(
				"Ident" => DENON_API_Commands::PSMULTEQ,
				"Name" => "Multi EQ Mode",
				"Profilesettings" => Array("Intensity", "", "", 0, 4, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "Audyssey",  "", -1),
				Array(2, "BYP.LR",  "", -1),
				Array(3, "Flat",  "", -1),
				Array(4, "Manual",  "", -1)
				)
			),
			$this->ptAudioRestorer => array(
				"Ident" => DENON_API_Commands::PSRSTR,
				"Name" => "Audio Restorer",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "Restorer 64",  "", -1),
				Array(2, "Restorer 96",  "", -1),
				Array(3, "Restorer HQ",  "", -1)
				)
			),
			$this->ptDynamicVolume => array(
				"Ident" => DENON_API_Commands::PSDYNVOL,
				"Name" => "Dynamic Volume",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "Midnight",  "", -1),
				Array(2, "Evening",  "", -1),
				Array(3, "Day",  "", -1)
				)
			),
			$this->ptRoomSize => array(
				"Ident" => DENON_API_Commands::PSRSZ,
				"Name" => "Room Size",
				"Profilesettings" => Array("Intensity", "", "", 0, 4, 0, 0),
				"Associations" => Array(
				Array(0, "Small",  "", -1),
				Array(1, "Small/Medium",  "", -1),
				Array(2, "Medium",  "", -1),
				Array(3, "Medium/Large",  "", -1),
				Array(4, "Large",  "", -1)
				)
			),
			$this->ptDynamicCompressor => array(
				"Ident" => DENON_API_Commands::PSDCO,
				"Name" => "Dynamic Compressor",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "Low",  "", -1),
				Array(2, "Middle",  "", -1),
				Array(3, "High",  "", -1)
				)
			),
			$this->ptDynamicRange => array(
				"Ident" => DENON_API_Commands::PSDRC,
				"Name" => "Dynamic Range",
				"Profilesettings" => Array("Intensity", "", "", 0, 4, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "Auto",  "", -1),
				Array(2, "Low",  "", -1),
				Array(3, "Middle",  "", -1),
				Array(4, "High",  "", -1)
				)
			),
			$this->ptVideoSelect => array(
				"Ident" => DENON_API_Commands::SV,
				"Name" => "Video Select",
				"Profilesettings" => Array("Intensity", "", "", 0, 8, 0, 0),
				"Associations" => Array(
				Array(0, "DVD",  "", -1),
				Array(1, "BD",  "", -1),
				Array(2, "TV",  "", -1),
				Array(3, "Sat/CBL",  "", -1),
				Array(4, "DVR",  "", -1),
				Array(5, "Game",  "", -1),
				Array(6, "V.AUX",  "", -1),
				Array(7, "Dock",  "", -1),
				Array(8, "Source",  "", -1)
				)
			),
			$this->ptSurroundBackMode => array(
				"Ident" => DENON_API_Commands::PSSB,
				"Name" => "Surround Back Mode",
				"Profilesettings" => Array("Intensity", "", "", 0, 4, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "On",  "", -1),
				Array(2, "Matrix On",  "", -1),
				Array(3, "PL2X Cinema",  "", -1),
				Array(4, "PL2X Music",  "", -1)
				)
			),
			$this->ptHDMIMonitor => array(
				"Ident" => DENON_API_Commands::VSMONI,
				"Name" => "HDMI Monitor",
				"Profilesettings" => Array("Intensity", "", "", 0, 2, 0, 0),
				"Associations" => Array(
				Array(0, "Auto",  "", -1),
				Array(1, "Monitor 1",  "", -1),
				Array(2, "Monitor 2",  "", -1)
				)
			),
			$this->ptSpeakerOutputFront => array(
				"Ident" => DENON_API_Commands::PSSP,
				"Name" => "Speaker Output Front",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "Front Height",  "", -1),
				Array(1, "Front Weight",  "", -1),
				Array(2, "HW",  "", -1),
				Array(3, "Off",  "", -1)
				)
			),
			$this->ptReferenceLevel => array(
				"Ident" => DENON_API_Commands::PSREFLEV,
				"Name" => "Reference Level",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "Offset 0",  "", -1),
				Array(1, "Offset 5",  "", -1),
				Array(2, "Offset 10",  "", -1),
				Array(3, "Offset 15",  "", -1)
				)
			),
			$this->ptPLIIZHeightGain => array(
				"Ident" => DENON_API_Commands::PSPHG,
				"Name" => "PLIIZ Height Gain",
				"Profilesettings" => Array("Intensity", "", "", 0, 2, 0, 0),
				"Associations" => Array(
				Array(0, "Low",  "", -1),
				Array(1, "Mid",  "", -1),
				Array(2, "High",  "", -1)
				)
			),
			$this->ptDolbyVolumeModeler => array(
				"Ident" => DENON_API_Commands::PSVOLMOD,
				"Name" => "Dolby Volume Modeler",
				"Profilesettings" => Array("Intensity", "", "", 0, 2, 0, 0),
				"Associations" => Array(
				Array(0, "Off",  "", -1),
				Array(1, "Half",  "", -1),
				Array(2, "Full",  "", -1)
				)
			),
			$this->ptDolbyVolumeLeveler => array(
				"Ident" => DENON_API_Commands::PSVOLLEV,
				"Name" => "Dolby Volume Leveler",
				"Profilesettings" => Array("Intensity", "", "", 0, 2, 0, 0),
				"Associations" => Array(
				Array(0, "Low",  "", -1),
				Array(1, "Middle",  "", -1),
				Array(2, "High",  "", -1)
				)
			),
			$this->ptVideoProcessingMode => array(
				"Ident" => DENON_API_Commands::VSVPM,
				"Name" => "Video Processing Mode",
				"Profilesettings" => Array("Intensity", "", "", 0, 2, 0, 0),
				"Associations" => Array(
				Array(0, "Auto",  "", -1),
				Array(1, "Game",  "", -1),
				Array(2, "Movie",  "", -1)
				)
			),
			$this->ptHDMIAudioOutput => array(
				"Ident" => DENON_API_Commands::VSAUDIO,
				"Name" => "HDMI Audio Output",
				"Profilesettings" => Array("Intensity", "", "", 0, 1, 0, 0),
				"Associations" => Array(
				Array(0, "TV",  "", -1),
				Array(1, "AMP",  "", -1)
				)
			),
			$this->ptResolutionHDMI => array(
				"Ident" => DENON_API_Commands::VSSCH,
				"Name" => "Resolution HDMI",
				"Profilesettings" => Array("Intensity", "", "", 0, 5, 0, 0),
				"Associations" => Array(
				Array(0, "480p/576p",  "", -1),
				Array(1, "1080i",  "", -1),
				Array(2, "720p",  "", -1),
				Array(3, "1080p",  "", -1),
				Array(4, "1080p 24Hz",  "", -1),
				Array(5, "Auto", "", -1)
				)
			),
			$this->ptResolution => array(
				"Ident" => DENON_API_Commands::VSSC,
				"Name" => "Resolution",
				"Profilesettings" => Array("Intensity", "", "", 0, 5, 0, 0),
				"Associations" => Array(
				Array(0, "480p/576p",  "", -1),
				Array(1, "1080i",  "", -1),
				Array(2, "720p",  "", -1),
				Array(3, "1080p",  "", -1),
				Array(4, "1080p 24Hz",  "", -1),
				Array(5, "Auto", "", -1)
				)
			),
			$this->ptASP => array(
				"Ident" => DENON_API_Commands::VSASP,
				"Name" => "ASP",
				"Profilesettings" => Array("Intensity", "", "", 0, 1, 0, 0),
				"Associations" => Array(
				Array(0, "Normal",  "", -1),
				Array(1, "Full",  "", -1)
				)
			),
			$this->ptDNRDirectChange => array(
				"Ident" => DENON_API_Commands::PVDNR,
				"Name" => "DNR Direct Change",
				"Profilesettings" => Array("Intensity", "", "", 0, 3, 0, 0),
				"Associations" => Array(
				Array(0, "OFF",  "", -1),
				Array(1, "Low",  "", -1),
				Array(2, "Middle",  "", -1),
				Array(3, "High",  "", -1)
				)
			),
			$this->ptInputMode => array(
				"Ident" => DENON_API_Commands::SD,
				"Name" => "Input Mode",
				"Profilesettings" => Array("Database", "", "", 0, 4, 0, 0),
				"Associations" => Array(
				Array(0, "AUTO",  "", -1),
				Array(1, "HDMI",  "", -1),
				Array(2, "DIGITAL",  "", -1),
				Array(3, "ANALOG",  "", -1),
				Array(4, "Ext.IN",  "", -1),				
				)
			)
		);
		
		$ProfilAssociationsMainZone[$this->ptInputSource] = $this->UsedInputSources;
			/*	
				array(
				"Ident" => DENON_API_Commands::SI,
				"Name" => "Input Source",
				"Profilesettings" => Array("Database", "", "", 0, 19, 0, 0),
				"Associations" => array(
				Array(0, "Phono",  "", -1),
				Array(1, "CD",  "", -1),
				Array(2, "Tuner",  "", -1),
				Array(3, "DVD",  "", -1),
				Array(4, "BD",  "", -1),
				Array(5, "TV",  "", -1),
				Array(6, "Sat/CBL",  "", -1),
				Array(7, "DVR",  "", -1),
				Array(8, "Game",  "", -1),
				Array(9, "V.Aux",  "", -1),
				Array(10, "Dock",  "", -1),
				Array(11, "IPod",  "", -1),
				Array(12, "Net/USB",  "", -1),
				Array(13, "Napster",  "", -1),
				Array(14, "LastFM",  "", -1),
				Array(15, "Flickr",  "", -1),
				Array(16, "Favorites",  "", -1),
				Array(17, "IRadio",  "", -1),
				Array(18, "Server",  "", -1),
				Array(19, "USB/IPod",  "", -1)
				)
			),*/
			
		
		
		
		
		$ProfilAssociationsZone2 = array
		(	
			/*
			$this->ptZone2InputSource => array(
				"Ident" => DENON_API_Commands::Z2,
				"Name" => "Zone 2 Input Source",
				"Profilesettings" => Array("Database", "", "", 0, 19, 1, 0),
				"Associations" => Array(
				Array(0, "Phono",  "", -1),
				Array(1, "CD",  "", -1),
				Array(2, "Tuner",  "", -1),
				Array(3, "DVD",  "", -1),
				Array(4, "BD",  "", -1),
				Array(5, "TV",  "", -1),
				Array(6, "SAT/CBL",  "", -1),
				Array(7, "DVR",  "", -1),
				Array(8, "GAME",  "", -1),
				Array(9, "V.AUX",  "", -1),
				Array(10, "DOCK",  "", -1),
				Array(11, "IPOD",  "", -1),
				Array(12, "NET/USB",  "", -1),
				Array(13, "NAPSTER",  "", -1),
				Array(14, "LASTFM",  "", -1),
				Array(15, "FLICKR",  "", -1),
				Array(16, "FAVORITES",  "", -1),
				Array(17, "IRADIO",  "", -1),
				Array(18, "SERVER",  "", -1),
				Array(19, "USB/IPOD",  "", -1)
				)
			),
			*/
			$this->ptNavigation => array(
				"Ident" => DENON_API_Commands::MN,
				"Name" => "Navigation",
				"Profilesettings" => Array("Move", "", "", 0, 5, 0, 0),
				"Associations" => array(
				Array(0, "Left",  "", -1),
				Array(1, "Down",  "", -1),
				Array(2, "Up",  "", -1),
				Array(3, "Right",  "", -1),
				Array(4, "Enter",  "", -1),
				Array(5, "Return",  "", -1)
				)		
			),
			$this->ptZone2ChannelSetting => array(
				"Ident" => DENON_API_Commands::Z2CS,
				"Name" => "Zone 2 Channel Setting",
				"Profilesettings" => Array("Database", "", "", 0, 1, 0, 0),
				"Associations" => Array(
				Array(0, "Stereo",  "", -1),
				Array(1, "Mono",  "", -1)
				)
			),
			$this->ptZone2QuickSelect => array(
				"Ident" => DENON_API_Commands::Z2QUICK,
				"Name" => "Zone 2 Quick Selektion",
				"Profilesettings" => Array("Database", "", "", 0, 5, 0, 0),
				"Associations" => Array(
				Array(0, "NONE",  "", -1),
				Array(1, "QS 1",  "", -1),
				Array(2, "QS 2",  "", -1),
				Array(3, "QS 3",  "", -1),
				Array(4, "QS 4",  "", -1),
				Array(5, "QS 5",  "", -1)
				)
			)
		);
		
		$ProfilAssociationsZone2[$this->ptZone2InputSource] = $this->UsedInputSourcesZ2;
		
		$ProfilAssociationsZone3 = array
		(
			/*
			$this->ptZone3InputSource => array(
				"Ident" => DENON_API_Commands::Z3,
				"Name" => "Zone 3 Input Source",
				"Profilesettings" => Array("Database", "", "", 0, 19, 1, 0),
				"Associations" => Array(
				Array(0, "Phono",  "", -1),
				Array(1, "CD",  "", -1),
				Array(2, "Tuner",  "", -1),
				Array(3, "DVD",  "", -1),
				Array(4, "BD",  "", -1),
				Array(5, "TV",  "", -1),
				Array(6, "SAT/CBL",  "", -1),
				Array(7, "DVR",  "", -1),
				Array(8, "GAME",  "", -1),
				Array(9, "V.AUX",  "", -1),
				Array(10, "DOCK",  "", -1),
				Array(11, "IPOD",  "", -1),
				Array(12, "NET/USB",  "", -1),
				Array(13, "NAPSTER",  "", -1),
				Array(14, "LASTFM",  "", -1),
				Array(15, "FLICKR",  "", -1),
				Array(16, "FAVORITES",  "", -1),
				Array(17, "IRADIO",  "", -1),
				Array(18, "SERVER",  "", -1),
				Array(19, "USB/IPOD",  "", -1)
				)
			),
			*/
			$this->ptNavigation => array(
				"Ident" => DENON_API_Commands::MN,
				"Name" => "Navigation",
				"Profilesettings" => Array("Move", "", "", 0, 5, 0, 0),
				"Associations" => array(
				Array(0, "Left",  "", -1),
				Array(1, "Down",  "", -1),
				Array(2, "Up",  "", -1),
				Array(3, "Right",  "", -1),
				Array(4, "Enter",  "", -1),
				Array(5, "Return",  "", -1)
				)		
			),
			$this->ptZone3ChannelSetting => array(
				"Ident" => DENON_API_Commands::Z3CS,
				"Name" => "Zone 3 Channel Setting",
				"Profilesettings" => Array("Database", "", "", 0, 1, 0, 0),
				"Associations" => Array(
				Array(0, "Stereo",  "", -1),
				Array(1, "Mono",  "", -1)
				)
			),
			$this->ptZone3QuickSelect => array(
				"Ident" => DENON_API_Commands::Z3QUICK,
				"Name" => "Zone 3 Quick Select",
				"Profilesettings" => Array("DataMainbase", "", "", 0, 5, 0, 0),
				"Associations" => Array(
				Array(0, "NONE",  "", -1),
				Array(1, "QS 1",  "", -1),
				Array(2, "QS 2",  "", -1),
				Array(3, "QS 3",  "", -1),
				Array(4, "QS 4",  "", -1),
				Array(5, "QS 5",  "", -1)
				)
			)
		);
		
		$ProfilAssociationsZone3[$this->ptZone3InputSource] = $this->UsedInputSourcesZ3;
		
		if($this->Zone == 0)
		{
			$profileintegerass = $this->sendprofileintegerass($ProfilAssociationsMainZone, $profile);
			return $profileintegerass;
		}
		elseif ($this->Zone == 1)
		{
			$profileintegerass = $this->sendprofileintegerass($ProfilAssociationsZone2, $profile);
			return $profileintegerass;
		}
		elseif ($this->Zone == 2)
		{
			$profileintegerass = $this->sendprofileintegerass($ProfilAssociationsZone3, $profile);
			return $profileintegerass;
		}
		
		
	}
	
	private function sendprofileintegerass($ProfilAssociationsZone, $profile)
	{
		foreach($ProfilAssociationsZone as $ptName => $profilvar)
			{
				if($ptName == $profile)
				{
					$pos = $this->getpos($profile);
				    $profilesettings = $profilvar["Profilesettings"];
					$Ident = $profilvar["Ident"];
					$Name = $profilvar["Name"];
					$profileintegerass = array(
					"ProfilName" => $ptName,
					"Ident" => $Ident,
					"Name" => $Name,
					"Icon" => $profilesettings[0],
					"Prefix" => $profilesettings[1],
					"Suffix" => $profilesettings[2],
					"MinValue" => $profilesettings[3],
					"MaxValue" => $profilesettings[4],
					"Stepsize" => $profilesettings[5],
					"Digits" => $profilesettings[6],
					"Associations" => $profilvar["Associations"],
					"Position" => $pos
				   );
				   
				   return $profileintegerass;
				}

			}	
	}
	
	
	public function SetupVarDenonFloat($profile)
	{
		//Sichtbare variablen profil suchen
		$profilesMainzone = array(
		$this->ptMasterVolume => array(DENON_API_Commands::MV, "Master Volume", "Intensity", "", " %", -80.0, 18.0, 0.5, 1),
		$this->ptChannelVolumeFL => array(DENON_API_Commands::CVFL, "Channel Volume Front Left", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeFR => array(DENON_API_Commands::CVFR, "Channel Volume Front Right", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeC => array(DENON_API_Commands::CVC, "Channel Volume Center", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSW => array(DENON_API_Commands::CVSW, "Channel Volume Subwoofer", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSW2 => array(DENON_API_Commands::CVSW2, "Channel Volume Subwoofer 2", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSL => array(DENON_API_Commands::CVSL, "Channel Volume Surround Left", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSR => array(DENON_API_Commands::CVSR, "Channel Volume Surround Right", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSBL => array(DENON_API_Commands::CVSBL, "Channel Volume Surround Back Left", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSBR => array(DENON_API_Commands::CVSBR, "Channel Volume Surround Back Right", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeSB => array(DENON_API_Commands::CVSB, "Channel Volume Surround Back", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeFHL => array(DENON_API_Commands::CVFHL, "Channel Volume Front Height Left", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeFHR => array(DENON_API_Commands::CVFHR, "Channel Volume Front Height Right", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeFWL => array(DENON_API_Commands::CVFWL, "Channel Volume Front Wide Left", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptChannelVolumeFWR => array(DENON_API_Commands::CVFWR, "Channel Volume Front Wide Right", "Intensity", "", " dB", -12, 12, 0.5, 1),
		$this->ptAudioDelay => array(DENON_API_Commands::PSDEL, "Audio Delay", "Intensity", "", " ms", 0, 200, 1, 0),
		$this->ptLFELevel => array(DENON_API_Commands::PSLFE, "LFE Level", "Intensity", "-", " dB", -10.0, 0.0, 0.5, 1),
		$this->ptBassLevel => array(DENON_API_Commands::PSBAS, "Bass Level", "Intensity", "", " dB", -6, 6, 0.5, 1),
		$this->ptTrebleLevel => array(DENON_API_Commands::PSTRE, "Treble Level", "Intensity", "", " dB", -6, 6, 0.5, 1),
		$this->ptCenterWidth => array(DENON_API_Commands::PSCEN, "Center Width", "Intensity",  "", "", 0, 7, 0.5, 1),
		$this->ptEffectLevel => array(DENON_API_Commands::PSEFF, "Effect Level", "Intensity", "", "", 0, 15, 0.5, 1),
		$this->ptCenterImage => array(DENON_API_Commands::PSCEN, "Center Image", "Intensity", "", "", 0.0, 1.0, 0.1, 1),
		$this->ptContrast => array(DENON_API_Commands::PVCN, "Contrast", "Intensity", "", "", -6, 6, 0.5, 1),
		$this->ptBrightness => array(DENON_API_Commands::PVBR, "Brightness", "Intensity", "", "", 0, 12, 0.5, 1),
		$this->ptChromalevel => array(DENON_API_Commands::PVCM, "Chroma Level", "Intensity", "", "", -6, 6, 0.5, 1),
		$this->ptHue => array(DENON_API_Commands::PVHUE, "Hue", "Intensity", "", "", -6, 6, 0.5, 1),
		$this->ptEnhancer => array(DENON_API_Commands::PVENH, "Enhancer", "Intensity", "", "", 0, 12, 0.5, 1),
		$this->ptStageHeight => array(DENON_API_Commands::PSSTH, "Stage Height", "Intensity", "", "", -10, 10, 0.5, 1),
		$this->ptStageWidth => array(DENON_API_Commands::PSSTW, "Stage Width", "Intensity", "", "", -10, 10, 0.5, 1)
		);
				
		$profilesZone2 = array(
		$this->ptZone2Volume => array(DENON_API_Commands::Z2VOL, "Zone 2 Volume", "Intensity", "", " %", -80.0, 18.0, 0.5, 1),
		$this->ptZone2ChannelVolumeFL => array(DENON_API_Commands::Z2CVFL, "Zone 2 Channel Volume Front Left", "Intensity", "", " %", -10.0, 10.0, 0.5, 1),
		$this->ptZone2ChannelVolumeFR => array(DENON_API_Commands::Z2CVFR, "Zone 2 Channel Volume Front Right", "Intensity", "", " %", -10.0, 10.0, 0.5, 1)
		);
		
		$profilesZone3 = array(
		$this->ptZone3Volume => array(DENON_API_Commands::Z3VOL, "Zone 3 Volume", "Intensity", "", " %", -80.0, 18.0, 0.5, 1),
		$this->ptZone3ChannelVolumeFL => array(DENON_API_Commands::Z3CVFL, "Zone 3 Channel Volume Front Left", "Intensity", "", " %", -10.0, 10.0, 0.5, 1),
		$this->ptZone3ChannelVolumeFR => array(DENON_API_Commands::Z3CVFR, "Zone 3 Channel Volume Front Right", "Intensity", "", " %", -10.0, 10.0, 0.5, 1)
		);
		
		if ($this->Zone == 0)
		{
			$profilefloat = $this->sendprofilefloat($profilesMainzone, $profile);
			return $profilefloat;
		}
		elseif ($this->Zone == 1)
		{
			$profilefloat = $this->sendprofilefloat($profilesZone2, $profile);
			return $profilefloat;
		}
		elseif ($this->Zone == 2)
		{
			$profilefloat = $this->sendprofilefloat($profilesZone3, $profile);
			return $profilefloat;
		}
	}

	
	private function sendprofilefloat($profilesZone, $profile)
	{
		foreach($profilesZone as $ptName => $profilvar)
		{
			if($ptName == $profile)
			{
				$pos = $this->getpos($profile);
				$Ident = $profilvar[0];
				$Name = $profilvar[1];
				$profilefloat = array(
				"ProfilName" => $ptName,
				"Name" => $Name,
				"Ident" => $Ident,
				"Icon" => $profilvar[2],
				"Prefix" => $profilvar[3],
				"Suffix" => $profilvar[4],
				"MinValue" => $profilvar[5],
				"MaxValue" => $profilvar[6],
				"Stepsize" => $profilvar[7],
				"Digits" => $profilvar[8],
				"Position" => $pos
			   
			   
			   );
			   
			   return $profilefloat;
			}

		}	
	}
	
	private function getpos($profile)
	{
		$positions = array 
						( 
                            $this->ptPower => 10,
							$this->ptMainZonePower => 11,
							$this->ptMainMute => 12,
							$this->ptMasterVolume => 13,
							$this->ptInputSource => 14,
							$this->ptSurroundMode => 15,
							$this->ptNavigation => 16,
							$this->ptDynamicVolume => 17,
							$this->ptDolbyVolume => 18,
							$this->ptDolbyVolumeLeveler => 19,
							$this->ptDolbyVolumeModeler => 20,
							$this->ptCinemaEQ => 21,
							$this->ptPanorama => 22,
							$this->ptNavigation => 23,
							
							$this->ptChannelVolumeFL => 30,
							$this->ptChannelVolumeFR => 31,
							$this->ptChannelVolumeC => 32,
							$this->ptChannelVolumeSW => 33,
							$this->ptChannelVolumeSW2 => 34,
							$this->ptChannelVolumeSL => 35,
							$this->ptChannelVolumeSR => 36,
							$this->ptChannelVolumeSBL => 37,
							$this->ptChannelVolumeSBR => 38,
							$this->ptChannelVolumeSB => 39,
							$this->ptChannelVolumeFHL => 40,
							$this->ptChannelVolumeFHR => 41,
							$this->ptChannelVolumeFWL => 42,
							$this->ptChannelVolumeFWR => 43,
							
							$this->ptFrontHeight => 50,
							$this->ptToneCTRL => 51,
							$this->ptDynamicEQ => 52,
							$this->ptAudioDelay => 53,
							$this->ptLFELevel => 54,
							$this->ptQuickSelect => 55,
							$this->ptSleep => 56,
							$this->ptDigitalInputMode => 57,
							$this->ptSurroundPlayMode => 58,
							$this->ptMultiEQMode => 59,
							$this->ptAudioRestorer => 60,
							$this->ptBassLevel => 61,
							$this->ptTrebleLevel => 62,
							$this->ptDimension => 63,
							$this->ptRoomSize => 64,
							$this->ptDynamicCompressor => 65,
							$this->ptCenterWidth => 66,
							$this->ptDynamicRange => 67,
							$this->ptVideoSelect => 68,
							$this->ptSurroundBackMode => 69,
							$this->ptPreset => 70,
							$this->ptInputMode => 71,
							
							
							$this->ptContrast => 72,
							$this->ptBrightness => 73,
							$this->ptChromalevel => 74,
							$this->ptHue => 75,
							$this->ptEnhancer => 76,
							$this->ptSubwoofer => 77,
							$this->ptSubwooferATT => 78,
							$this->ptDNRDirectChange => 79,
							$this->ptEffect => 80,
							$this->ptAFDM => 81,
							$this->ptEffectLevel => 82,
							$this->ptCenterImage => 84,
							$this->ptStageWidth => 85,
							$this->ptStageHeight => 86,
							$this->ptAudysseyDSX => 87,
							$this->ptReferenceLevel => 88,
							$this->ptDRCDirectChange => 89,
							$this->ptSpeakerOutputFront => 90,
							$this->ptDCOMPDirectChange => 91,
							$this->ptHDMIMonitor => 92,
							$this->ptASP => 93,
							$this->ptResolution => 94,
							$this->ptResolutionHDMI => 95,
							$this->ptHDMIAudioOutput => 96,
							$this->ptVideoProcessingMode => 97,
							
							$this->ptPLIIZHeightGain => 100,
							$this->ptVerticalStretch => 101,
							
							$this->ptFriendlyName => 102,
							$this->ptMainZoneName => 103,
							$this->ptTopMenuLink => 104,
							$this->ptModel => 105,
							
							$this->ptZone2Power => 201,
							$this->ptZone2Mute => 202,
							$this->ptZone2Volume => 203,
							$this->ptZone2InputSource => 204,
							$this->ptZone2ChannelSetting => 205,
							$this->ptZone2ChannelVolumeFL => 206,
							$this->ptZone2ChannelVolumeFR => 207,
							$this->ptZone2QuickSelect => 208,
							$this->ptZone2HPF => 209,
							$this->ptZone2Name => 210,
							$this->ptZone2Sleep => 211,
							
							$this->ptZone3Power => 300,
							$this->ptZone3Mute => 301,
							$this->ptZone3Volume => 302,
							$this->ptZone3InputSource => 303,
							$this->ptZone3ChannelSetting => 304,
							$this->ptZone3ChannelVolumeFL => 305,
							$this->ptZone3ChannelVolumeFR => 306,
							$this->ptZone3QuickSelect => 307,
							$this->ptZone3HPF => 308,
							$this->ptZone3Name => 309,
							$this->ptZone3Sleep => 310

						);
		foreach($positions as $ptName => $position)
		{
			if($ptName == $profile)
			{
			   return $position;
			}

		}				
	}
}

class DENON_StatusHTML extends stdClass
{
	public $ipdenon;	
	//Status
	public function getStates ()
	{
		//Main
		$DataMain = array();
		$xmlMainZone = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formMainZone_MainZoneXml.xml"));
				
		if ($xmlMainZone)
			{
			$DataMain = $this->MainZoneXml($xmlMainZone, $DataMain);
			}
		else
			{
			exit("Datei ".$xmlMainZone." konnte nicht geöffnet werden.");
			}
		
		$xmlMainZoneStatus = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formMainZone_MainZoneXmlStatus.xml"));
				
		if ($xmlMainZoneStatus)
			{
			$DataMain = $this->MainZoneXmlStatus($xmlMainZoneStatus, $DataMain);
			}
		else
			{
			exit("Datei ".$xmlMainZoneStatus." konnte nicht geöffnet werden.");
			}

		
		$xmlNetAudioStatus = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formMainZone_NetAudioStatusXml.xml"));
				
		if ($xmlNetAudioStatus)
			{
			$DataMain = $this->NetAudioStatusXml($xmlNetAudioStatus, $DataMain);
			}
		else
			{
			exit("Datei ".$xmlNetAudioStatus." konnte nicht geöffnet werden.");
			}
			
		$xmlDeviceinfo = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formMainZone_Deviceinfo.xml"));
			
		if ($xmlDeviceinfo)
			{
			$DataMain = $this->Deviceinfo($xmlDeviceinfo, $DataMain);
			}
		else
			{
			exit("Datei ".$xmlDeviceinfo." konnte nicht geöffnet werden.");
			}
			
		
		
		 // Zone 2
		
		$DataZ2 = array();
		$xml = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formMainZone_MainZoneXml.xml?_=&ZoneName=ZONE2"));
		if ($xml)
				{
				$DataZ2 = $this->StateZone2($xml, $DataZ2);
				}
		else
			{
			exit("Datei ".$xml." konnte nicht geöffnet werden.");
			}
				
		
		// Zone 3
		
		$DataZ3 = array();
		$xml = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formMainZone_MainZoneXml.xml?_=&ZoneName=ZONE3"));
		if ($xml)
			{
			$DataZ3 = $this->StateZone3($xml, $DataZ3);
			}
		else
			{
			exit("Datei ".$xml." konnte nicht geöffnet werden.");
			}
		
		//Model
		$xmlDeviceSearch = new SimpleXMLElement(file_get_contents("http://".$this->ipdenon."/goform/formiPhoneAppDeviceSearch.xml"));
				
		if ($xmlDeviceSearch)
			{
			$DataMain = $this->DeviceSearch($xmlDeviceSearch, $DataMain);
			$DataZ2 = $this->DeviceSearch($xmlDeviceSearch, $DataZ2);
			$DataZ3 = $this->DeviceSearch($xmlDeviceSearch, $DataZ3);
			}
		else
			{
			exit("Datei ".$xmlDeviceSearch." konnte nicht geöffnet werden.");
			}	
		
		$datasend = array(
			'ResponseType' => 'HTTP',
			'Data' => array(
					'Mainzone' => $DataMain,
					'Zone2' => $DataZ2,
					'Zone3' => $DataZ3
					)
			);
			
			return $datasend;
	}
	
	protected function MainZoneXml($xml, $data)
	{
		
		//FriendlyName
		$FriendlyName = $xml->xpath('.//FriendlyName');
		if ($FriendlyName)
		{
			$data['FriendlyName'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$FriendlyName[0]->value, 'Subcommand' => 'Denon AVR Name');
		}
				
		//Power
		$AVRPower = $xml->xpath('.//Power');
		if ($AVRPower)
		{	
			$AVRPowerMapping = array("ON" => true, "STANDBY" => false);
			foreach ($AVRPowerMapping as $Command => $AVRPowerValue)
			{
			if ($Command == (string)$AVRPower[0]->value)
				{
				$data[DENON_API_Commands::PW] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $AVRPowerValue, 'Subcommand' => $Command);	
				}
			}	
		}


		//Zone Power
		$ZonePower = $xml->xpath('.//ZonePower');
		if ($ZonePower)
		{
			$ZonePowerMapping = array("ON" => true, "OFF" => false);
			foreach ($ZonePowerMapping as $Command => $ZonePowerValue)
			{
			if ($Command == (string)$ZonePower[0]->value)
				{
				$data[DENON_API_Commands::ZM] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $ZonePowerValue, 'Subcommand' => $Command);
				}
			}	
		}

		//RenameZone
		$RenameZone = $xml->xpath('.//RenameZone');
		if ($RenameZone)
		{
			$data['MainZoneName'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$RenameZone[0]->value, 'Subcommand' => 'MainZone Name');	
		}



		//TopMenuLink
		/*
		$TopMenuLink = $xml->xpath('.//TopMenuLink');
		if ($TopMenuLink)
		{
			$data['TopMenuLink'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$TopMenuLink[0]->value, 'Subcommand' => 'TopMenu Link');
		}
		*/

		//ModelId
		/*
		$ModelId = $xml->xpath('.//ModelId');
		if ($ModelId)
		{
			$data['ModelId'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$ModelId[0]->value, 'Subcommand' => 'ModelId');
		}
		*/

		//SalesArea
		/*
		$SalesArea = $xml->xpath('.//SalesArea');
		if ($SalesArea)
		{
			$data['SalesArea'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$SalesArea[0]->value, 'Subcommand' => 'SalesArea');
		}
		*/
		
		//InputFuncSelect
		$InputFuncSelect = $xml->xpath('.//InputFuncSelect');
		if ($InputFuncSelect)
		{
			//Array holen
			$InputSourceMapping = array("PHONO" => 0, "CD" => 1, "TUNER" => 2, "DVD" => 3, "BD" => 4, "TV" => 5, "SAT/CBL" => 6, "DVR" => 7, "GAME" => 8, "V.AUX" => 9, "DOCK" => 10, "IPOD" => 11, "NET/USB" => 12, "NAPSTER" => 13, "LASTFM" => 14,
												"FLICKR" => 15, "FAVORITES" => 16, "IRADIO" => 17, "SERVER" => 18, "USB/IPOD" => 19);
			foreach ($InputSourceMapping as $Command => $InputSourceValue)
			{
			if ($Command == (string)$InputFuncSelect[0]->value)
				{
				$data[DENON_API_Commands::SI] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => $InputSourceValue, 'Subcommand' => $Command);
				}
			}	
			
		}
		

		//NetFuncSelect
		/*
		$NetFuncSelect = $xml->xpath('.//NetFuncSelect');
		if ($NetFuncSelect)
		{
			$data['NetFuncSelect'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$NetFuncSelect[0]->value, 'Subcommand' => 'NetFuncSelect');
		}
		*/

		//InputFuncSelectMain
		/*
		$InputFuncSelectMain = $xml->xpath('.//InputFuncSelectMain');
		if ($InputFuncSelectMain)
		{
			$data['SI'] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => (string)$InputFuncSelectMain[0]->value, 'Subcommand' => 'Input Source');
		}
		*/
		
		//selectSurround
		/*
		$selectSurround = $xml->xpath('.//selectSurround');
		if ($selectSurround)
		{
			$data['MS'] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => (string)$selectSurround[0]->value, 'Subcommand' => 'Surround Mode');
		}
		*/
		
		//VolumeDisplay z.B. relative
		/*
		$VolumeDisplay = $xml->xpath('.//VolumeDisplay');
		if ($VolumeDisplay)
		{
			$data['VolumeDisplay'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$VolumeDisplay[0]->value, 'Subcommand' => 'VolumeDisplay');
		}
		*/


		//MasterVolume
		$MasterVolume = $xml->xpath('.//MasterVolume');
		if ($MasterVolume)
		{
			$data[DENON_API_Commands::MV] =  array('VarType' => DENONIPSVarType::vtFloat, 'Value' => (float)$MasterVolume[0]->value, 'Subcommand' => (float)$MasterVolume[0]->value);
		}
		

		//Mute
		$Mute = $xml->xpath('.//Mute');
		if ($Mute)
		{
			$MuteMapping = array("on" => true, "off" => false);
			foreach ($MuteMapping as $Command => $MuteValue)
			{
			if ($Command == (string)$Mute[0]->value)
				{
				$data[DENON_API_Commands::MU] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $MuteValue, 'Subcommand' => $Command);
				}
			}	
		}

		//RemoteMaintenance
		/*
		$RemoteMaintenance = $xml->xpath('.//RemoteMaintenance');
		if ($RemoteMaintenance)
		{
			$RemoteMaintenanceMapping = array("ON" => true, "OFF" => false);
			foreach ($RemoteMaintenanceMapping as $Command => $RemoteMaintenanceValue)
			{
			if ($Command == (string)$RemoteMaintenance[0]->value)
				{
				$data['RemoteMaintenance'] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $RemoteMaintenanceValue, 'Subcommand' => 'RemoteMaintenance');
				}
			}	
		}
		*/

		//GameSourceDisplay
		/*
		$GameSourceDisplay = $xml->xpath('.//GameSourceDisplay');
		if ($GameSourceDisplay)
		{
			$data['GameSourceDisplay'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$GameSourceDisplay[0]->value, 'Subcommand' => 'GameSourceDisplay');
		}
		*/

		//LastfmDisplay
		/*
		$LastfmDisplay = $xml->xpath('.//LastfmDisplay');
		if ($LastfmDisplay)
		{
			$data['LastfmDisplay'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$LastfmDisplay[0]->value, 'Subcommand' => 'LastfmDisplay');
		}
		*/

		//SubwooferDisplay
		/*
		$SubwooferDisplay = $xml->xpath('.//SubwooferDisplay');
		if ($SubwooferDisplay)
		{
			$data['SubwooferDisplay'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$SubwooferDisplay[0]->value, 'Subcommand' => 'SubwooferDisplay');
		}
		*/


		//Zone2VolDisp
		/*
		$Zone2VolDisp = $xml->xpath('.//Zone2VolDisp');
		if ($Zone2VolDisp )
		{
			$data['Zone2VolDisp'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$Zone2VolDisp[0]->value, 'Subcommand' => 'Zone2VolDisp');
		}
		*/
		
	
	return $data;
	}
	
	protected function MainZoneXmlStatus($xml, $data)
	{
		
		//RestorerMode
		/*
		$RestorerMode = $xml->xpath('.//RestorerMode');
		if ($RestorerMode)
		{
			$data[DENON_API_Commands::PSRSTR] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => (string)$RestorerMode[0]->value, 'Subcommand' => 'Audio Restorer');
		}
		*/

		//SurrMode
		$SurrMode = $xml->xpath('.//SurrMode');
		if ($SurrMode)
		{
			$SurroundMapping = array("Direct" => 0, "Pure_Direct" => 1, "Stereo" => 2, "Standard" => 3, "Standard(Dolby)" => 4, "Standard(DTS)" => 5, "Multi_CH_Stereo" => 6, "Wide_Screen" => 7, "Super_Stadium" => 8, "Rock_Arena" => 9, "Jazz_Club" => 10, "Classic_Concert" => 11, "Mono_Movie" => 12, "Matrix" => 13, "Video_Game" => 14,
												"Virtual" => 15);
			foreach ($SurroundMapping as $Command => $SurroundValue)
			{
			if ($Command == (string)$SurrMode[0]->value)
				{
				$data[DENON_API_Commands::MS] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => $SurroundValue, 'Subcommand' => 'Surround Mode');
				}
			}	
			
			
		}

		return $data;
	}
	
	protected function NetAudioStatusXml($xml, $data)
	{
		//Model
		$szLine = $xml->xpath('.//szLine');
		if ($szLine)
			{
				$data['ModelDisplay'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$szLine[0]->value, 'Subcommand' => 'ModelDisplay');
			}
		

		return $data;
	}
	
	protected function Deviceinfo($xml, $data)
	{
		//ModelName
		$ModelName = $xml->xpath('.//ModelName');
		if ($ModelName)
			{
				$data['ModelName'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$ModelName[0], 'Subcommand' => 'ModelName');
			}
		
		
		
		return $data;
	}
	
	protected function DeviceSearch($xml, $data)
	{
		//Model
		$Model = $xml->xpath('.//Model');
		if ($Model)
			{
				$ModelValue = str_replace(" ", "", (string)$Model[0]->value);
				$data['Model'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => $ModelValue, 'Subcommand' => 'Model');
			}
		

		return $data;
	}
	
	protected function StateZone2($xml, $data)
	{
		//Power
		$AVRPower = $xml->xpath('.//Power');
		if ($AVRPower)
		{	
			$AVRPowerMapping = array("ON" => true, "STANDBY" => false);
			foreach ($AVRPowerMapping as $Command => $AVRPowerValue)
			{
			if ($Command == (string)$AVRPower[0]->value)
				{
				$data[DENON_API_Commands::PW] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $AVRPowerValue, 'Subcommand' => $Command);	
				}
			}	
		}


		//Zone Power
		$ZonePower = $xml->xpath('.//ZonePower');
		if ($ZonePower)
		{
			$ZonePowerMapping = array("ON" => true, "OFF" => false);
			foreach ($ZonePowerMapping as $Command => $ZonePowerValue)
			{
			if ($Command == (string)$ZonePower[0]->value)
				{
				$data[DENON_API_Commands::Z2POWER] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $ZonePowerValue, 'Subcommand' => $Command);
				}
			}	
		}

		//Zone Name
		$RenameZone = $xml->xpath('.//RenameZone');
		if ($RenameZone)
		{
			$data['Zone2Name'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$RenameZone[0]->value, 'Subcommand' => 'MainZone Name');	
		}
		
		//InputFuncSelect
		$InputFuncSelect = $xml->xpath('.//InputFuncSelect');
		if ($InputFuncSelect)
		{
			//Array holen
			$InputSourceMapping = array("PHONO" => 0, "CD" => 1, "TUNER" => 2, "DVD" => 3, "BD" => 4, "TV" => 5, "SAT/CBL" => 6, "DVR" => 7, "GAME" => 8, "V.AUX" => 9, "DOCK" => 10, "IPOD" => 11, "NET/USB" => 12, "NAPSTER" => 13, "LASTFM" => 14,
												"FLICKR" => 15, "FAVORITES" => 16, "IRADIO" => 17, "SERVER" => 18, "USB/IPOD" => 19);
			foreach ($InputSourceMapping as $Command => $InputSourceValue)
			{
			if ($Command == (string)$InputFuncSelect[0]->value)
				{
				$data[DENON_API_Commands::Z2INPUT] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => $InputSourceValue, 'Subcommand' => $Command);
				}
			}	
			
		}
		
		//MasterVolume
		$MasterVolume = $xml->xpath('.//MasterVolume');
		if ($MasterVolume)
		{
			$data[DENON_API_Commands::Z2VOL] =  array('VarType' => DENONIPSVarType::vtFloat, 'Value' => (float)$MasterVolume[0]->value, 'Subcommand' => (float)$MasterVolume[0]->value);
		}
		

		//Mute
		$Mute = $xml->xpath('.//Mute');
		if ($Mute)
		{
			$MuteMapping = array("on" => true, "off" => false);
			foreach ($MuteMapping as $Command => $MuteValue)
			{
			if ($Command == (string)$Mute[0]->value)
				{
				$data[DENON_API_Commands::Z2MU] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $MuteValue, 'Subcommand' => $Command);
				}
			}	
		}

	return $data;
	}
	
	protected function StateZone3($xml, $data)
	{
		//Power
		$AVRPower = $xml->xpath('.//Power');
		if ($AVRPower)
		{	
			$AVRPowerMapping = array("ON" => true, "STANDBY" => false);
			foreach ($AVRPowerMapping as $Command => $AVRPowerValue)
			{
			if ($Command == (string)$AVRPower[0]->value)
				{
				$data[DENON_API_Commands::PW] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $AVRPowerValue, 'Subcommand' => $Command);	
				}
			}	
		}


		//Zone Power
		$ZonePower = $xml->xpath('.//ZonePower');
		if ($ZonePower)
		{
			$ZonePowerMapping = array("ON" => true, "OFF" => false);
			foreach ($ZonePowerMapping as $Command => $ZonePowerValue)
			{
			if ($Command == (string)$ZonePower[0]->value)
				{
				$data[DENON_API_Commands::Z3POWER] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $ZonePowerValue, 'Subcommand' => $Command);
				}
			}	
		}

		//Zone Name
		$RenameZone = $xml->xpath('.//RenameZone');
		if ($RenameZone)
		{
			$data['Zone3Name'] =  array('VarType' => DENONIPSVarType::vtString, 'Value' => (string)$RenameZone[0]->value, 'Subcommand' => 'MainZone Name');	
		}
		
		//InputFuncSelect
		$InputFuncSelect = $xml->xpath('.//InputFuncSelect');
		if ($InputFuncSelect)
		{
			//Array holen
			$InputSourceMapping = array("PHONO" => 0, "CD" => 1, "TUNER" => 2, "DVD" => 3, "BD" => 4, "TV" => 5, "SAT/CBL" => 6, "DVR" => 7, "GAME" => 8, "V.AUX" => 9, "DOCK" => 10, "IPOD" => 11, "NET/USB" => 12, "NAPSTER" => 13, "LASTFM" => 14,
												"FLICKR" => 15, "FAVORITES" => 16, "IRADIO" => 17, "SERVER" => 18, "USB/IPOD" => 19);
			foreach ($InputSourceMapping as $Command => $InputSourceValue)
			{
			if ($Command == (string)$InputFuncSelect[0]->value)
				{
				$data[DENON_API_Commands::Z3INPUT] =  array('VarType' => DENONIPSVarType::vtInteger, 'Value' => $InputSourceValue, 'Subcommand' => $Command);
				}
			}	
			
		}
		
		//MasterVolume
		$MasterVolume = $xml->xpath('.//MasterVolume');
		if ($MasterVolume)
		{
			$data[DENON_API_Commands::Z3VOL] =  array('VarType' => DENONIPSVarType::vtFloat, 'Value' => (float)$MasterVolume[0]->value, 'Subcommand' => (float)$MasterVolume[0]->value);
		}
		

		//Mute
		$Mute = $xml->xpath('.//Mute');
		if ($Mute)
		{
			$MuteMapping = array("on" => true, "off" => false);
			foreach ($MuteMapping as $Command => $MuteValue)
			{
			if ($Command == (string)$Mute[0]->value)
				{
				$data[DENON_API_Commands::Z3MU] =  array('VarType' => DENONIPSVarType::vtBoolean, 'Value' => $MuteValue, 'Subcommand' => $Command);
				}
			}	
		}

	return $data;
	}
	
}

class DENON_Zone extends stdClass
{

    const Mainzone = 0;
    const Zone2 = 1;
    const Zone3 = 2;
	const None = 6;
    
    public $thisZone;
	static $ZoneCMDs = array(
        DENON_Zone::Mainzone => array(
            DENON_API_Commands::PW,
			DENON_API_Commands::MV,
			DENON_API_Commands::CVFL,
			DENON_API_Commands::CVFR,
			DENON_API_Commands::CVC,
			DENON_API_Commands::CVSW,
			DENON_API_Commands::CVSW2,
			DENON_API_Commands::CVSL,
			DENON_API_Commands::CVSR,
			DENON_API_Commands::CVSBL,
			DENON_API_Commands::CVSBR,
			DENON_API_Commands::CVSB,
			DENON_API_Commands::CVFHL,
			DENON_API_Commands::CVFHR,
			DENON_API_Commands::CVFWL,
			DENON_API_Commands::CVFWR,
			DENON_API_Commands::MU,
			DENON_API_Commands::SI,
			DENON_API_Commands::ZM,
			DENON_API_Commands::SD,
			DENON_API_Commands::DC,
			DENON_API_Commands::SV,
			DENON_API_Commands::SLP,
			DENON_API_Commands::MS,
			DENON_API_Commands::MSQUICK,
			DENON_API_Commands::MSQUICKMEMORY,			
			DENON_API_Commands::PSATT,
			DENON_API_Commands::VSASP,
			DENON_API_Commands::VSSC,
			DENON_API_Commands::VSSCH,
			DENON_API_Commands::VSAUDIO,
			DENON_API_Commands::VSMONI,
			DENON_API_Commands::VSVPM,
			DENON_API_Commands::VSVST,
			DENON_API_Commands::PSTONE,
			DENON_API_Commands::PSSB,
			DENON_API_Commands::PSCINEMAEQ,
			DENON_API_Commands::PSMODE,
			DENON_API_Commands::PSDOLVOL,
			DENON_API_Commands::PSVOLLEV,
			DENON_API_Commands::PSVOLMOD,
			DENON_API_Commands::PSFH,
			DENON_API_Commands::PSPHG,
			DENON_API_Commands::PSSP,
			DENON_API_Commands::PSMULTEQ,
			DENON_API_Commands::PSDYNEQ,
			DENON_API_Commands::PSREFLEV,
			DENON_API_Commands::PSDYNVOL,
			DENON_API_Commands::PSDSX,
			DENON_API_Commands::PSSTW,
			DENON_API_Commands::PSSTH,
			DENON_API_Commands::PSBAS,
			DENON_API_Commands::PSTRE,
			DENON_API_Commands::PSDRC,
			DENON_API_Commands::PSDCO,
			DENON_API_Commands::PSLFE,
			DENON_API_Commands::PSEFF,
			DENON_API_Commands::PSDEL,
			DENON_API_Commands::PSAFD,
			DENON_API_Commands::PSPAN,
			DENON_API_Commands::PSDIM,
			DENON_API_Commands::PSCEN,
			DENON_API_Commands::PSCEI,
			DENON_API_Commands::PSRSTR,
			DENON_API_Commands::PSRSZ,
			DENON_API_Commands::PSSWR,
			DENON_API_Commands::PSATT,			
            DENON_API_Commands::PVCN,
            DENON_API_Commands::PVBR,
            DENON_API_Commands::PVCM,
            DENON_API_Commands::PVHUE,
            DENON_API_Commands::PVDNR,
            DENON_API_Commands::PVENH,
			DENON_API_Commands::MN

        ),
        DENON_Zone::Zone2 => array(
            DENON_API_Commands::Z2,
            DENON_API_Commands::Z2MU,
			DENON_API_Commands::Z2CS,
			DENON_API_Commands::Z2CVFL,
			DENON_API_Commands::Z2CVFR,
			DENON_API_Commands::Z2HPF,
			DENON_API_Commands::Z2PSBAS,
			DENON_API_Commands::Z2PSTRE,
			DENON_API_Commands::Z2SLP
        ),
        DENON_Zone::Zone3 => array(
            DENON_API_Commands::Z3,
			DENON_API_Commands::Z3MU,
			DENON_API_Commands::Z3CS,
			DENON_API_Commands::Z3CVFL,
			DENON_API_Commands::Z3CVFR,
			DENON_API_Commands::Z3HPF,
			DENON_API_Commands::Z3PSBAS,
			DENON_API_Commands::Z3PSTRE,
            DENON_API_Commands::Z3SLP
        )
		
    );
	
	public function CmdAvaiable(DenonAVRCP_API_Data $API_Data)
    {
        return (in_array($API_Data->APICommand, self::$ZoneCMDs[$this->thisZone]));
    }
	
	public function SubCmdAvaiable(DenonAVRCP_API_Data $API_Data)
    {

	//  IPS_LogMessage('APISubCommand', print_r($API_Data->APISubCommand, 1));
	//  IPS_LogMessage('ZoneCMDs', print_r(self::$ZoneCMDs[$this->thisZone], 1));
        if ($API_Data->APISubCommand <> null)
            if (property_exists($API_Data->APISubCommand, $this->thisZone))
                return (in_array($API_Data->APISubCommand->{$this->thisZone}, self::$ZoneCMDs[$this->thisZone]));
        return false;
    }
	
}

class DENON_API_Commands extends stdClass
{

//MAIN Zone
    const PW = "PW"; // Power
    const MV = "MV"; // Master Volume
	//const CV = "CV"; // Channel Volume
	//CV
	const CVFL = "CVFL"; // Channel Volume Front Left
	const CVFR = "CVFR"; // Channel Volume Front Right
	const CVC = "CVC"; // Channel Volume Center
	const CVSW = "CVSW"; // Channel Volume Subwoofer
	const CVSW2 = "CVSW2"; // Channel Volume Subwoofer2
	const CVSL = "CVSL"; // Channel Volume Surround Left
	const CVSR = "CVSR"; // Channel Volume Surround Right
	const CVSBL = "CVSBL"; // Channel Volume Surround Back Left
	const CVSBR = "CVSBR"; // Channel Volume Surround Back Right
	const CVSB = "CVSB"; // Channel Volume Surround Back
	const CVFHL = "FHL"; // Channel Volume Front Height Left
	const CVFHR = "FHR"; // Channel Volume Front Height Right
	const CVFWL = "FWL"; // Channel Volume Front Wide Left
	const CVFWR = "FWR"; // Channel Volume Front Wide Right
	const MU = "MU"; // Volume Mute
	const SI = "SI"; // Select
	const ZM = "ZM"; // Main Zone
	const SD = "SD"; // Select Auto/HDMI/Digital/Analog
	const DC = "DC"; // Select Auto/PCM/DTS
	const SV = "SV"; // Video Select
	const SLP = "SLP"; // Main Zone Sleep Timer
	const MS = "MS"; // Select Surround Mode
	const MSQUICK = "MSQUICK"; // Quick Select Mode Select
	const MSQUICKMEMORY = "MEMORY"; // Quick Select Mode Memory
	
	
	//VS
	const VSASP = "VSASP"; // ASP
	const VSSC = "VSSC"; // Set Resolution
	const VSSCH = "VSSCH"; // Set Resolution HDMI
	const VSAUDIO = "VSAUDIO"; // Set HDMI Audio Output
	const VSMONI = "VSMONI"; // Set HDMI Monitor
	const VSVPM = "VSVPM"; // Set Video Processing Mode
	const VSVST = "VSVST"; // Set Vertical Stretch
	//PS
	const PSATT = "PSATT"; // SW ATT
	const PSTONE = "PSTONE"; // Tone Control
	const PSSB = "PSSB"; // Surround Back SP Mode
	const PSCINEMAEQ = "PSCINEMA_EQ"; // Cinema EQ
	const PSMODE = "PSMODE"; // Mode Music
	const PSDOLVOL = "PSDOLVOL"; // Dolby Volume direct change
	const PSVOLLEV = "PSVOLLEV"; // Dolby Volume Leveler direct change
	const PSVOLMOD = "PSVOLMOD"; // Dolby Volume Modeler direct change
	const PSFH = "PSFH"; // FRONT HEIGHT
	const PSPHG = "PSPHG"; // PL2z HEIGHT GAIN direct change
	const PSSP = "PSSP"; // Speaker Output set
	const PSMULTEQ = "PSMULTEQ"; // MultEQ XT 32 mode direct change
	const PSDYNEQ = "PSDYNEQ"; // Dynamic EQ
	const PSREFLEV = "PSREFLEV"; // Reference Level Offset
	const PSDYNVOL = "PSDYNVOL"; // Dynamic Volume
	const PSDSX = "PSDSX"; // Audyssey DSX ON
	const PSSTW = "PSSTW"; // STAGE WIDTH
	const PSSTH = "PSSTH"; // STAGE HEIGHT
	const PSBAS = "PSBAS"; // BASS
	const PSTRE = "PSTRE"; // TREBLE
	const PSDRC = "PSDRC"; // DRC direct change
	const PSDCO = "PSDCO"; // D.COMP direct change	
	const PSLFE = "PSLFE"; // LFE
	const PSEFF = "PSEFF"; // EFFECT direct change	
	const PSDEL = "PSDEL"; // Audio DELAY	
	const PSAFD = "PSAFD"; // AFDM	
	const PSPAN = "PSPAN"; // PANORAMA	
	const PSDIM = "PSDIM"; // DIMENSION	
	const PSCEN = "PSCEN"; // CENTER WIDTH	
	const PSCEI = "PSCEI"; // CENTER IMAGE
	const PSRSTR = "PSRSTR"; //Audio Restorer
	const PSRSZ = "PSRSZ"; //Room Size
	const PSSWR = "PSSWR"; //Subwoofer
	
	//PV
	const PVCN = "PVCN"; // Contrast
	const PVBR = "PVBR"; // Brightness
	const PVCM = "PVCM"; // Chroma
	const PVHUE = "PVHUE"; // Hue
	const PVDNR = "PVDNR"; // DNR direct change
	const PVENH = "PVENH"; // Enhancer
	
	const SR = " ?"; //Status Request
	
	//Zone 2
	const Z2 = "Z2"; // Zone 2
	const Z2POWER = "Z2POWER"; // Zone 2 Power Z2 beim Senden
	const Z2INPUT = "Z2INPUT"; // Zone 2 Input Z2 beim Senden
	const Z2VOL = "Z2VOL"; // Zone 2 Volume Z2 beim Senden
	const Z2MU = "Z2MU"; // Zone 2 Mute
	const Z2CS = "Z2CS"; // Zone 2 Channel Setting
	const Z2CVFL = "Z2CVFL"; // Zone 2 Channel Volume FL
	const Z2CVFR = "Z2CVFR"; // Zone 2 Channel Volume FR
	const Z2HPF = "Z2HPF"; // Zone 2 HPF
	const Z2PSBAS = "Z2PSBAS"; // Zone 2 Parameter Bass
	const Z2PSTRE = "Z2PSTRE"; // Zone 2 Parameter Treble
	const Z2SLP = "Z2SLP"; // Zone 2 Sleep Timer
	const Z2QUICK = "Z2QUICK"; // Zone 2 Quick
	
	//Zone 3
	const Z3 = "Z3"; // Zone 3
	const Z3POWER = "Z3POWER"; // Zone 3 Power Z3 beim Senden
	const Z3INPUT = "Z3INPUT"; // Zone 3 Input Z3 beim Senden
	const Z3VOL = "Z2VOL"; // Zone 3 Volume Z3 beim Senden
	const Z3MU = "Z3MU"; // Zone 3 Mute
	const Z3CS = "Z3CS"; // Zone 3 Channel Setting
	const Z3CVFL = "Z3CVFL"; // Zone 3 Channel Volume FL
	const Z3CVFR = "Z3CVFR"; // Zone 3 Channel Volume FR
	const Z3HPF = "Z3HPF"; // Zone 3 HPF
	const Z3PSBAS = "Z3PSBAS"; // Zone 3 Parameter Bass
	const Z3PSTRE = "Z3PSTRE"; // Zone 3 Parameter Treble
	const Z3SLP = "Z3SLP"; // Zone 3 Sleep Timer
	const Z3QUICK = "Z3QUICK"; // Zone 3 Quick
	
	const TF = "TF"; // Tuner Frequency
	const TP = "TP"; // Tuner Preset
	const TM = "TM"; // Tuner Mode
	const NS = "NS"; // Network Audio
	const TR = "TR"; // Trigger
	const SY = "SY"; // Remote Lock
	const UG = "UG"; // Upgrade ID Display
	const NSA = "NSA"; // Network Audio Extended
	const NSE = "NSE"; // Network Audio Onscreen Display Information
	
	//SUB Commands
	
	//PW
	const ON = "ON"; // Power On
	const STANDBY = "STANDBY"; // Power Standbye
	
	//MV
	const UP = "UP"; // Master Volume Up
	const DOWN = "DOWN"; // Master Volume Down
	
	
	//SI
	const PHONO = "PHONO"; // Select Input Source Phono
	const CD = "CD"; // Select Input Source CD
	const TUNER = "TUNER"; // Select Input Source Tuner
	const DVD = "DVD"; // Select Input Source DVD
	const BD = "BD"; // Select Input Source BD
	const TV = "TV"; // Select Input Source TV
	const SAT = "SAT/CBL"; // Select Input Source Sat/CBL
	const DVR = "DVR"; // Select Input Source DVR
	const GAME = "GAME"; // Select Input Source Game
	const VAUX = "V.AUX"; // Select Input Source V.AUX
	const DOCK = "DOCK"; // Select Input Source Dock
	const IPOD = "IPOD"; // Select Input Source iPOD
	const NETUSB = "NET/USB"; // Select Input Source NET/USB
	const LASTFM = "LASTFM"; // Select Input Source LastFM
	const FLICKR = "FLICKR"; // Select Input Source Flickr
	const FAVORITES = "FAVORITES"; // Select Input Source Favorites
	const IRADIO = "IRADIO"; // Select Input Source Internet Radio
	const SERVER = "SERVER"; // Select Input Source Server
	
	//ZM Mainzone
	const OFF = "OFF"; // Power Off
	
	//SD
	const AUTO = "AUTO"; // Auto Mode
	const HDMI = "HDMI"; // HDMI Mode
	const DIGITAL = "DIGITAL"; // Digital Mode
	const ANALOG = "ANALOG"; // Analog Mode
	const EXTIN = "EXT.IN"; // Ext.In Mode
	const NO = "NO"; // no Input
	
	//DC Digital Input
	const PCM = "PCM"; // PCM Mode
	const DTS = "DTS"; // DTS Mode
	
	//MS Surround Mode
	const DIRECT = "DIRECT"; // Direct Mode
	const PUREDIRECT = "PURE DIRECT"; // Pure Direct Mode
	const STEREO = "STEREO"; // Stereo Mode
	const STANDARD = "STANDARD"; // Standard Mode
	const DOLBYDIGITAL = "DOLBY DIGITAL"; // Dolby Digital Mode
	const DTSSUROUND = "DTS SUROUND"; // DTS Suround Mode
	const MCHSTEREO = "MCH STEREO"; // Multi Channel Stereo Mode
	const WIDESCREEN = "WIDE SCREEN"; // Wide Screen Mode
	const SUPERSTADIUM = "SUPER STADIUM"; // Super Stadium Mode
	const ROCKARENA = "ROCK ARENA"; // Rock Arena Mode
	const JAZZCLUB = "JAZZ CLUB"; // Jazz Club Mode
	const CLASSICCONCERT = "CLASSIC CONCERT"; // Classic Concert Mode
	const MONOMOVIE = "MONO MOVIE"; // Mono Movie Mode
	const MATRIX = "MATRIX"; // Matrix Mode
	const VIDEOGAME = "VIDEO GAME"; // Video Game Mode
	const VIRTUAL = "VIRTUAL"; // Virtual Mode
	//Quick Select Mode
	const QUICK1 = "1"; // Quick Select 1 Mode Select
	const QUICK2 = "2"; // Quick Select 2 Mode Select
	const QUICK3 = "3"; // Quick Select 3 Mode Select
	const QUICK4 = "4"; // Quick Select 4 Mode Select
	const QUICK5 = "5"; // Quick Select 5 Mode Select
	
	//MSQUICKMEMORY
	const QUICK1MEMORY = "1 MEMORY"; // Quick Select 1 Mode Memory
	const QUICK2MEMORY = "2 MEMORY"; // Quick Select 2 Mode Memory
	const QUICK3MEMORY = "3 MEMORY"; // Quick Select 3 Mode Memory
	const QUICK4MEMORY = "4 MEMORY"; // Quick Select 4 Mode Memory
	const QUICK5MEMORY = "5 MEMORY"; // Quick Select 5 Mode Memory
	const QUICK = "QUICK ?"; // QUICK ? Return MSQUICK Status
	
	//VS
	//VSMONI Set HDMI Monitor
	const MONI1 = "1"; // 1
	const MONI2 = "2"; // 2
	
	
	//VSASP
	const ASPNRM = "NRM"; // Set Normal Mode
	const ASPFUL = "FUL"; // Set Full Mode
	const ASP = " ?"; // ASP ? Return VSASP Status
	
	//VSSC Set Resolution
	const SC48P = "48P"; // Set Resolution to 480p/576p
	const SC10I = "10I"; // Set Resolution to 1080i
	const SC72P = "72P"; // Set Resolution to 720p
	const SC10P = "10P"; // Set Resolution to 1080p
	const SC10P24 = "10P24"; // Set Resolution to 1080p:24Hz
	const SCAUTO = "AUTO"; // Set Resolution to Auto
	const SC = " ?"; // SC ? Return VSSC Status
	
	//VSSCH Set Resolution HDMI
	const SCH48P = "48P"; // Set Resolution to 480p/576p HDMI
	const SCH10I = "10I"; // Set Resolution to 1080i HDMI
	const SCH72P = "72P"; // Set Resolution to 720p HDMI
	const SCH10P = "10P"; // Set Resolution to 1080p HDMI
	const SCH10P24 = "10P24"; // Set Resolution to 1080p:24Hz HDMI
	const SCHAUTO = "AUTO"; // Set Resolution to Auto HDMI
	const SCH = " ?"; // SCH ? Return VSSCH Status(HDMI)
	
	//VSAUDIO Set HDMI Audio Output
	const AUDIOAMP = " AMP"; // Set HDMI Audio Output to AMP
	const AUDIOTV = " TV"; // Set HDMI Audio Output to TV
	const AUDIO = " ?"; // AUDIO ? Return VSAUDIO Status
	
	//VSVPM Set Video Processing Mode
	const VPMAUTO = "AUTO"; // Set Video Processing Mode to Auto
	const VPGAME = "GAME"; // Set Video Processing Mode to Game
	const VPMOVI = "OVI"; // Set Video Processing Mode to Movie
	const VPM = " ?"; // VPM ? Return VSVPM Status
	
	//VSVST Set Vertical Stretch
	const VSTON = " ON"; // Set Vertical Stretch On
	const VSTOFF = " OFF"; // Set Vertical Stretch Off 
	const VST = " ?"; // VST ? Return VSVST Status
	
	//PS Parameter
	//PSTONE Tone Control
	const TONECTRLON = " CTRL ON"; // Tone Control On
	const TONECTRLOFF = " CTRL OFF"; // Tone Control Off
	const TONECTRL = " CTRL ?"; // TONE CTRL ? Return PSTONE CONTROL Status
	
	//PSSB Surround Back SP Mode
	const SBMTRXON = ":MTRX ON"; // Surround Back SP Mode Matrix
	const SBPL2XCINEMA = ":PL2X CINEMA"; // Surround Back SP Mode	PL2X Cinema
	const SBPL2XMUSIC = ":PL2X MUSIC"; // Surround Back SP Mode	PL2X Music
	const SBON = ":ON"; // Surround Back SP Mode on
	const SBOFF = ":OFF"; // Surround Back SP Mode off
	
	//PSCINEMAEQ Cinema EQ
	const CINEMAEQON = ".ON"; // Cinema EQ on
	const CINEMAEQOFF = ".OFF"; // Cinema EQ off
	const CINEMAEQ = ". ?"; // Return PSCINEMA EQ.Status
	
	//PSMODE Mode Music
	const MODEMUSIC = "MUSIC"; // Mode Music CINEMA / MUSIC / GAME / PL mode change
	const MODECINEMA = "CINEMA"; // This parameter can change DOLBY PL2,PL2x,NEO:6 mode.
	const MODEGAME = "GAME"; // SB=ON：PL2x mode / SB=OFF：PL2 mode GAME can change DOLBY PL2 & PL2x mode PSMODE:PRO LOGIC
	const MODEPROLOGIC = "PRO LOGIC"; // PL can change ONLY DOLBY PL2 mode
	const MODE = " ?"; // Return PSMODE: Status
	
	//PSDOLVOL Dolby Volume direct change
	const DOLVOLON = " ON"; // Dolby Volume direct change on
	const DOLVOLOFF = " OFF"; // Dolby Volume direct change off
	const DOLVOL = " ?"; // Return PSDOLVOL Status
	
	//PSVOLLEV Dolby Volume Leveler direct change
	const VOLLEVLOW = " LOW"; // Dolby Volume Leveler direct change Low
	const VOLLEVMID = " MID"; // Dolby Volume Leveler direct change Middle
	const VOLLEVHI = " HI"; // Dolby Volume Leveler direct change High
	const VOLLEV = " ?"; // Return PSVOLLEV Status
	
	// PSVOLMOD Dolby Volume Modeler direct change
	const VOLMODHLF = " HLF"; // Dolby Volume Modeler direct change half
	const VOLMODFUL = " FUL"; // Dolby Volume Modeler direct change full
	const VOLMODOFF = " OFF"; // Dolby Volume Modeler direct change off
	const VOLMOD = " ?"; // Return PSVOLMOD Status

	//PSFH Front Height
	const FHON = "ON"; // FRONT HEIGHT ON
	const FHOFF = "OFF"; // FRONT HEIGHT OFF
	const FH = " ?"; // Return PSFH: Status
	
	//PSPHG PL2z Height Gain direct change
	const PHGLOW = " LOW"; // PL2z HEIGHT GAIN direct change low
	const PHGMID = " MID"; // PL2z HEIGHT GAIN direct change middle
	const PHGHI = " HI"; // PL2z HEIGHT GAIN direct change high
	const PHG = " ?"; // Return PSPHG Status
	
	//PSSP Speaker Output set
	const SPFH = "FH"; // Speaker Output set FH
	const SPFW = "FW"; // Speaker Output set FW
	const SPHW = "HW"; // Speaker Output set HW
	const SPOFF = "OFF"; // Speaker Output set off
	const SP = " ?"; // Return PSSP: Status

	// MulEQ XT 32 mode direct change
	const MULTEQAUDYSSEY = "AUDYSSEY"; // MultEQ XT 32 mode direct change MULTEQ:AUDYSSEY
	const MULTEQBYPLR = "BYP.LR"; // MultEQ XT 32 mode direct change MULTEQ:BYP.LR
	const MULTEQFLAT = "FLAT"; // MultEQ XT 32 mode direct change MULTEQ:FLAT
	const MULTEQMANUAL = "MANUAL"; // MultEQ XT 32 mode direct change MULTEQ:MANUAL
	const MULTEQOFF = "OFF"; // MultEQ XT 32 mode direct change MULTEQ:OFF
	const MULTEQ = " ?"; // Return PSMULTEQ: Status
	
	//PSDYNEQ Dynamic EQ
	const DYNEQON = " ON"; // Dynamic EQ = ON
	const DYNEQOFF = " OFF"; // Dynamic EQ = OFF
	const DYNEQ = " ?"; // Return PSDYNEQ Status
	
	//PSREFLEV Reference Level Offset
	const REFLEV0 = " 0"; // Reference Level Offset=0dB
	const REFLEV5 = " 5"; // Reference Level Offset=5dB
	const REFLEV10 = " 10"; // Reference Level Offset=10dB
	const REFLEV15 = " 15"; // Reference Level Offset=15dB
	const REFLEV = " ?"; // Return PSREFLEV Status
	
	//PSDYNVOL Dynamic Volume
	const DYNVOLNGT = " NGT"; // Dynamic Volume = Midnight
	const DYNVOLEVE = " EVE"; // Dynamic Volume = Evening
	const DYNVOLDAY = " DAY"; // Dynamic Volume = Day
	const DYNVOL = " ?"; // Return PSDYNVOL Status
	
	//PSDSX Audyssey DSX ON
	const DSXONHW = " ONHW"; // Audyssey DSX ON(Height/Wide)
	const DSXONH = " ONH"; // Audyssey DSX ON(Height)
	const DSXONW = " ONW"; // Audyssey DSX ON(Wide)
	const DSXOFF = " OFF"; // Audyssey DSX OFF
	const DSX = " ?"; // Return PSDSX Status
	
	//PSSTW Stage Width
	const STWUP = " UP"; // STAGE WIDTH UP
	const STWDOWN = " DOWN"; // STAGE WIDTH DOWN
	const STW = " "; // STAGE WIDTH ** ---AVR-4311 can be operated from -10 to +10
	
	//PSSTH Stage Height
	const STHUP = " UP"; // STAGE HEIGHT UP
	const STHDOWN = " DOWN"; // STAGE HEIGHT DOWN
	const STH = " "; // STAGE HEIGHT ** ---AVR-4311 can be operated from -10 to +10
	
	//PSBAS Bass
	const BASUP = " UP"; // BASS UP
	const BASDOWN = " DOWN"; // BASS DOWN
	const BAS = " "; // BASS ** ---AVR-4311 can be operated from -6 to +6
	
	//PSTRE Treble
	const TREUP = " UP"; // TREBLE UP
	const TREDOWN = " DOWN"; // TREBLE DOWN
	const TRE = " "; // TREBLE ** ---AVR-4311 can be operated from -6 to +6
	
	//PSDRC DRC direct change
	const DRCAUTO = " AUTO"; // DRC direct change
	const DRCLOW = " LOW"; // DRC Low
	const DRCMID = " MID"; // DRC Middle
	const DRCHI = " HI"; // DRC High
	const DRCOFF = "OFF"; // DRC off
	const DRC = " ?"; // Return PSDRC Status
	

	//PSDCO D.Comp direct change
	const DCOOFF = " OFF"; // D.COMP direct change
	const DCOLOW = " LOW"; // D.COMP Low
	const DCOMID = " MID"; // D.COMP Middle
	const DCOHIGH = " HIGH"; // D.COMP High
	const DCO = " ?"; // Return PSDCO Status

	//PSLFE LFE	
	const LFEDOWN = " DOWN"; // LFE DOWN
	const LFEUP = " UP"; // LFE UP
	const LFE = " "; // LFE ** ---AVR-4311 can be operated from 0 to -10


	//PSEFF Effect direct change
	const EFFON = " ON"; // EFFECT ON direct change
	const EFFOFF = " OFF"; // EFFECT OFF direct change
	
	const EFFUP = " UP"; // EFFECT UP direct change
	const EFFDOWN = " DOWN"; // EFFECT DOWN direct change
	const EFF = " "; // EFFECT ** ---AVR-4311 can be operated from 1 to 15


	//PSDEL Delay
	const DELUP = " UP"; // DELAY UP
	const DELDOWN = " DOWN"; // DELAY DOWN
	const DEL = " "; // DELAY ** ---AVR-4311 can be operated from 0 to 300

	//PSAFD AFDM
	const AFDON = " ON"; // AFDM ON
	const AFDOFF = " OFF"; // AFDM OFF
	const AFD = " "; // Return PSAFD Status


	//PSPAN Panorama
	const PANON = "PAN ON"; // PANORAMA ON
	const PANOFF = "PAN OFF"; // PANORAMA OFF
	const PAN = "PAN ?"; // Return PSPAN Status


	//PSDIM Dimension
	const DIMUP = " UP"; // DIMENSION UP
	const DIMDOWN = " DOWN"; // DIMENSION DOWN
	const DIM = " "; // ---AVR-4311 can be operated from 0 to 6


	//PSCEN Center Width
	const CENUP = "CEN UP"; // CENTER WIDTH UP
	const CENDOWN = "CEN DOWN"; // CENTER WIDTH DOWN
	const CEN = "CEN "; // ---AVR-4311 can be operated from 0 to 7

	//PSCEI Center Image
	const CEIUP = "CEI UP"; // CENTER IMAGE UP
	const CEIDOWN = "CEI DOWN"; // CENTER IMAGE DOWN
	const CEI = "CEI "; // ---AVR-4311 can be operated from 0 to 7
	
	
	//PSRSZ Room Size
	const RSZS = " S";
	const RSZMS = " MS";
	const RSZN = " M";
	const RSZML = " ML";
	const RSZL = " L";
	
	
	//SW ATT
	const ATTON = "ATT ON"; // SW ATT ON
	const ATTOFF = "ATT OFF"; // SW ATT OFF
	const ATT = "ATT ?"; // Return PSATT Status
	
	
	//Cursor
	const MN = "MN"; // Cursor Navigation
	const MNCUP = "CUP"; // Cursor Up
	const MNCDN = "CDN"; // Cursor Down
	const MNCRT = "CRT"; // Cursor Right
	const MNCLT = "CLT"; // Cursor Left
	const MNENT = "ENT"; // Cursor Enter
	const MNRTN = "RTN"; // Cursor Return
	
	const MNMEN = "MNMEN"; // GUI Menu
	const MNMENON = " ON"; // GUI Menu On
	const MNMENOFF = " OFF"; // GUI Menu Off
	
	const MNSRC = "MNSRC"; // GUI Menu
	const MNSRCON = " ON"; // GUI Menu On
	const MNSRCOFF = " OFF"; // GUI Menu Off
	
	
	const IsVariable = 0;
    const VarType = 1;
    const VarName = 2;
    const Profile = 3;
    const EnableAction = 4;
    const RequestValue = 5;
    const ValueMapping = 6;
    const ValuePrefix = 7;
	
	// Mapping von CMDs der Main auf identische CMDs der Zonen
	
    static $CMDMapping = array(
        DENON_API_Commands::PW => array(
            DENON_Zone::Mainzone => DENON_API_Commands::ZM,            
            DENON_Zone::Zone2 => DENON_API_Commands::Z2,
            DENON_Zone::Zone3 => DENON_API_Commands::Z3
        )
    );
}	

class DENON_API_Command_Mapping extends stdClass
{

    static public function GetMapping($Cmd) //__construct($Cmd)
    {
        if (array_key_exists($Cmd, DENON_API_Commands::$CMDMapping))
        {
//            IPS_LogMessage('GetMapping', print_r(ISCP_API_Commands::$CMDMapping[$Cmd], 1));
            return DENON_API_Commands::$CMDMapping[$Cmd];
            /*
              $this->VarType = ISCP_API_Commands::$VarMapping[$Cmd][ISCP_API_Commands::VarType];
              $this->EnableAction = ISCP_API_Commands::$VarMapping[$Cmd][ISCP_API_Commands::EnableAction];
              $this->Profile = ISCP_API_Commands::$VarMapping[$Cmd][ISCP_API_Commands::Profile];
             */
        }
        else
            return null;
    }

}

class DENON_API_Data_Mapping extends stdClass
{

//    public $VarType;
//    public $EnableAction;
//    public $Profile;

    static public function GetMapping($Cmd) //__construct($Cmd)
    {
        if (array_key_exists($Cmd, DENON_API_Commands::$VarMapping))
        {
            $result = new stdClass;
            $result->IsVariable = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::IsVariable];
            $result->VarType = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::VarType];
            $result->VarName = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::VarName];
            $result->Profile = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::Profile];
            $result->EnableAction = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::EnableAction];
            $result->RequestValue = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::RequestValue];

            $result->ValueMapping = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::ValueMapping];

            if (array_key_exists(DENON_API_Commands::ValuePrefix, DENON_API_Commands::$VarMapping[$Cmd]))
                $result->ValuePrefix = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::ValuePrefix];

            return $result;
            /*
              $this->VarType = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::VarType];
              $this->EnableAction = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::EnableAction];
              $this->Profile = DENON_API_Commands::$VarMapping[$Cmd][DENON_API_Commands::Profile];
             */
        }
        else
            return null;
    }

}


class DenonAVRCP_API_Data extends stdClass
{

    public $APICommand;
	public $APIIdent;
    public $Data;
    public $Mapping = null;
    public $APISubCommand = null;
	
	public $VarMapping = array
				(
					//Boolean
					//Power
					DENON_API_Commands::PW
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "STANDBY" => false)
					),
					//MainZonePower
					DENON_API_Commands::ZM
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//MainMute
					DENON_API_Commands::MU
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//CinemaEQ
					DENON_API_Commands::PSCINEMAEQ
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(".ON" => true, ".OFF" => false)
					),
					//Panorama
					DENON_API_Commands::PSPAN
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//ToneCTRL
					DENON_API_Commands::PSTONE
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//FrontHeight
					DENON_API_Commands::PSFH
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(":ON" => true, ":OFF" => false)
					),
					//DynamicEQ
					DENON_API_Commands::PSDYNEQ
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//Vertical Stretch
					DENON_API_Commands::VSVST
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//Dolby Volume
					DENON_API_Commands::PSDOLVOL
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//Effect
					DENON_API_Commands::PSEFF
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//AFDM
					DENON_API_Commands::PSAFD
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//Subwoofer
					DENON_API_Commands::PSSWR
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//Subwoofer ATT
					DENON_API_Commands::PSATT
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array(" ON" => true, " OFF" => false)
					),
					//Zone 2
					//Zone 2 Power
					DENON_API_Commands::Z2POWER
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//Zone 2 Mute
					DENON_API_Commands::Z2MU
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//Zone 2 HPF
					DENON_API_Commands::Z2HPF
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//Zone 3
					//Zone 3 Power
					DENON_API_Commands::Z3POWER
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//Zone 3 Mute
					DENON_API_Commands::Z3MU
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					//Zone 3 HPF
					DENON_API_Commands::Z3HPF
					=> array(
						"VarType" => DENONIPSVarType::vtBoolean,
						"ValueMapping" => array("ON" => true, "OFF" => false)
					),
					
					//Integer
					//Sleep ***:001 to 120 by ASCII , 010=10min
					DENON_API_Commands::SLP
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("OFF" => 0, "010" => 10, "020" => 20, "030" => 30, "040" => 40, "050" => 50, "060" => 60, "070" => 70, "080" => 80, "090" => 90, "100" => 100, "110" => 110, "120" => 120)
					),
					//Dimension **:00 to 06 by ASCII , 00=0, can be operated from 0 to 6
					DENON_API_Commands::PSDIM
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" 00" => 0, " 01" => 1, " 02" => 2, " 03" => 3, " 04" => 4, " 05" => 5, " 06" => 6)
					),
					//Zone 2
					//Sleep Zone 2 ***:001 to 120 by ASCII , 010=10min
					DENON_API_Commands::Z2SLP
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("OFF" => 0, "010" => 10, "020" => 20, "030" => 30, "040" => 40, "050" => 50, "060" => 60, "070" => 70, "080" => 80, "090" => 90, "100" => 100, "110" => 110, "120" => 120)
					),
					//Zone 3
					//Sleep Zone 3 ***:001 to 120 by ASCII , 010=10min
					DENON_API_Commands::Z3SLP
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("OFF" => 0, "010" => 10, "020" => 20, "030" => 30, "040" => 40, "050" => 50, "060" => 60, "070" => 70, "080" => 80, "090" => 90, "100" => 100, "110" => 110, "120" => 120)
					),
					// Integer Association
					//Navigation
					DENON_API_Commands::MN
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("CLT" => 0, "CDN" => 1, "CUP" => 2, "CRT" => 3, "ENT" => 4, "RTN" => 5)
					),
					//Input Source
					DENON_API_Commands::SI
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						//Funktion zum Variablen Aufbau einbauen
						"ValueMapping" => array("PHONO" => 0, "CD" => 1, "TUNER" => 2, "DVD" => 3, "BD" => 4, "TV" => 5, "SAT/CBL" => 6, "DVR" => 7, "GAME" => 8, "V.AUX" => 9, "DOCK" => 10, "IPOD" => 11, "NET/USB" => 12, "NAPSTER" => 13, "LASTFM" => 14,
												"FLICKR" => 15, "FAVORITES" => 16, "IRADIO" => 17, "SERVER" => 18, "USB/IPOD" => 19)
					),
					//Quick Select
					DENON_API_Commands::MSQUICK
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" ?" => 0, "1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5,)
					),
					//Digital Input Mode
					DENON_API_Commands::DC
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("AUTO" => 0, "PCM" => 1, "DTS" => 2)
					),
					//Surround Mode
					DENON_API_Commands::MS
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("DIRECT" => 0, "PURE DIRECT" => 1, "STEREO" => 2, "STANDARD" => 3, "DOLBY DIGITAL" => 4, "DTS SURROUND" => 5, "MCH STEREO" => 6, "WIDESCREEN" => 7, "SUPERSTADIUM" => 8, "ROCK ARENA" => 9, "JAZZ CLUB" => 10, "CLASSICCONCERT" => 11, "MONO MOVIE" => 12, "MATRIX" => 13, "VIDEO GAME" => 14,
												"VIRTUAL" => 15)
					),
					//Surround Play Mode
					DENON_API_Commands::PSMODE
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(":CINEMA" => 0, ":MUSIC" => 1, ":GAME" => 2, ":PRO LOGIC" => 3)
					),
					//Multi EQ Mode
					DENON_API_Commands::PSMULTEQ
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(":OFF" => 0, ":AUDYSSEY" => 1, ":BYP.LR" => 2, ":FLAT" => 3, ":MANUAL" => 4)
					),
					//Audio Restorer
					DENON_API_Commands::PSRSTR
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" OFF" => 0, " MODE1" => 1, " MODE2" => 2, " MODE3" => 3)
					),
					//Dynamic Volume
					DENON_API_Commands::PSDYNVOL
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" ?" => 0, " NGT" => 1, " EVE" => 2, " DAY" => 3)
					),
					//Room Size
					DENON_API_Commands::PSRSZ
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" S" => 0, " MS" => 1, " N" => 2, " ML" => 3, " L" => 4)
					),
					//Dynamic Compressor
					DENON_API_Commands::PSDCO
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" OFF" => 0, " LOW" => 1, " MID" => 2, " HIGH" => 3)
					),
					//Dynamic Range
					DENON_API_Commands::PSDRC
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" OFF" => 0, " AUTO" => 1, " LOW" => 2, " MID" => 3, " HIGH" => 4)
					),
					//Video Select
					DENON_API_Commands::SV
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("DVD" => 0, "BD" => 1, "TV" => 2, "SAT/CBL" => 3, "DVR" => 4, "GAME" => 5, "V.AUX" => 6, "DOCK" => 7, "SOURCE" => 8)
					),
					//Surround Back Mode
					DENON_API_Commands::PSSB
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(":OFF" => 0, ":ON" => 1, ":MTRX ON" => 2, ":PL2X CINEMA" => 3, ":PL2X MUSIC" => 4)
					),
					//HDMI Monitor
					DENON_API_Commands::VSMONI
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("AUTO" => 0, "1" => 1, "2" => 2)
					),
					//Speaker Output Front
					DENON_API_Commands::PSSP
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(":FH" => 0, ":FW" => 1, ":HW" => 2, ":OFF" => 3)
					),
					//Reference Level
					DENON_API_Commands::PSREFLEV
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" 0" => 0, " 5" => 1, " 10" => 2, " 15" => 3)
					),
					//PLIIZ Height Gain
					DENON_API_Commands::PSPHG
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" LOW" => 0, " MID" => 1, " HI" => 2)
					),
					//Dolby Volume Modeler
					DENON_API_Commands::PSVOLMOD
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" OFF" => 0, " HLF" => 1, " FUL" => 2)
					),
					//Dolby Volume Leveler
					DENON_API_Commands::PSVOLLEV
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" LOW" => 0, " MID" => 1, " HI" => 2)
					),
					//Video Processing Mode
					DENON_API_Commands::VSVPM
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("AUTO" => 0, "GAME" => 1, "MOVIE" => 2)
					),
					//HDMI Audio Output
					DENON_API_Commands::VSAUDIO
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" TV" => 0, " AMP" => 1)
					),
					//Resolution HDMI
					DENON_API_Commands::VSSCH
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("48P" => 0, "10I" => 1, "72P" => 2, "10P" => 3, "10P24" => 4, "AUTO" => 5)
					),
					//Resolution
					DENON_API_Commands::VSSC
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("48P" => 0, "10I" => 1, "72P" => 2, "10P" => 3, "10P24" => 4, "AUTO" => 5)
					),
					//ASP
					DENON_API_Commands::VSASP
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("NRM" => 0, "FUL" => 1)
					),
					//DNR Direct Change
					DENON_API_Commands::PVDNR
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" OFF" => 0, " LOW" => 1, " MID" => 2, " HI" => 3)
					),
					//Input Mode
					DENON_API_Commands::SD
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("AUTO" => 0, "HDMI" => 1, "DIGITAL" => 2, "ANALOG" => 3, "EXT.IN" => 4)
					),
					//Zone 2
					//Zone 2 Input Source
					DENON_API_Commands::Z2INPUT
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("PHONO" => 0, "CD" => 1, "TUNER" => 2, "DVD" => 3, "BD" => 4, "TV" => 5, "SAT/CBL" => 6, "DVR" => 7, "GAME" => 8, "V.AUX" => 9, "DOCK" => 10, "IPOD" => 11, "NET/USB" => 12, "NAPSTER" => 13, "LASTFM" => 14,
												"FLICKR" => 15, "FAVORITES" => 16, "IRADIO" => 17, "SERVER" => 18, "USB/IPOD" => 19)
					),					
					//Zone 2 Channel Setting
					DENON_API_Commands::Z2CS
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("ST" => 0, "MONO" => 1)
					),
					//Zone 2 Quick Selektion
					DENON_API_Commands::Z2QUICK
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" ?" => 0, "1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5)
					),
					//Zone 3
					//Zone 3 Input Source
					DENON_API_Commands::Z3INPUT
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("PHONO" => 0, "CD" => 1, "TUNER" => 2, "DVD" => 3, "BD" => 4, "TV" => 5, "SAT/CBL" => 6, "DVR" => 7, "GAME" => 8, "V.AUX" => 9, "DOCK" => 10, "IPOD" => 11, "NET/USB" => 12, "NAPSTER" => 13, "LASTFM" => 14,
												"FLICKR" => 15, "FAVORITES" => 16, "IRADIO" => 17, "SERVER" => 18, "USB/IPOD" => 19)
					),
					//Zone 3 Channel Setting
					DENON_API_Commands::Z3CS
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array("ST" => 0, "MONO" => 1)
					),
					//Zone 3 Quick Selektion
					DENON_API_Commands::Z3QUICK
					=> array(
						"VarType" => DENONIPSVarType::vtInteger,
						"ValueMapping" => array(" ?" => 0, "1" => 1, "2" => 2, "3" => 3, "4" => 4, "5" => 5)
					),				
					//Float
					//Master Volume
					DENON_API_Commands::MV
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array
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
						)
					),
					//Channel Volume FL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVFL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume FR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVFR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume C **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVC
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SW **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSW
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SW2 **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSW2
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SBL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSBL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SBR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSBR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume SB **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVSB
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume FHL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVFHL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume FHR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVFHR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume FWL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVFWL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Channel Volume FWR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::CVFWR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Audio Delay ***:000 to 300 by ASCII , 000=0ms, 300=300ms
					DENON_API_Commands::PSDEL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 000" => 0, " 001" => 1, " 002" => 2, " 003" => 3, " 004" => 4, " 005" => 5, " 006" => 6, " 007" => 7, " 008" => 8, " 009" => 9, " 010" => 10, " 011" => 11, " 012" => 12,
						" 013" => 13, " 014" => 14, " 015" => 15, " 016" => 16, " 017" => 17, " 018" => 18, " 019" => 19, " 020" => 20, " 021" => 21, " 022" => 22, " 023" => 23, " 024" => 24, " 025" => 25, " 026" => 26,
						" 027" => 27, " 028" => 28, " 029" => 29, " 030" => 30, " 031" => 31, " 032" => 32, " 033" => 33, " 034" => 34, " 035" => 35, " 036" => 36, " 037" => 37, " 038" => 38, " 039" => 39, " 040" => 40,
						" 041" => 41,
					" 042" => 42,
					" 043" => 43,
					" 044" => 44,
					" 045" => 45,
					" 046" => 46,
					" 047" => 47,
					" 048" => 48,
					" 049" => 49,
					" 050" => 50,
					" 051" => 51,
					" 052" => 52,
					" 053" => 53,
					" 054" => 54,
					" 055" => 55,
					" 056" => 56,
					" 057" => 57,
					" 058" => 58,
					" 059" => 59,
					" 060" => 60,
					" 061" => 61,
					" 062" => 62,
					" 063" => 63,
					" 064" => 64,
					" 065" => 65,
					" 066" => 66,
					" 067" => 67,
					" 068" => 68,
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
					" 300" => 300)
					),
					//LFELevel **:00 to 10 by ASCII , 00=0dB, 10=-10dB
					DENON_API_Commands::PSLFE
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 00" => 0, " 005" => -0.5, " 01" => -1, " 015" => -1.5, " 02" => -2, " 025" => -2.5, " 03" => -3, " 035" => -3.5, " 04" => -4, " 045" => -4.5,
												" 05" => -5, " 055" => -5.5, " 06" => -6, " 065" => -6.5, " 07" => -7, " 075" => -7.5, " 08" => -8, " 085" => -8.5, " 09" => -9, " 095" => -9.5,
												" 10" => 10)
					),
					//Bass Level **:44 to 56 by ASCII , 50=0dB can be operated from -6 to +6
					DENON_API_Commands::PSBAS
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6)
												
					),
					//Treble Level **:44 to 56 by ASCII , 50=0dB can be operated from -6 to +6
					DENON_API_Commands::PSTRE
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6)
					),
					//Center Width **:00 to 07 by ASCII , 00=0 can be operated from 0 to 7
					DENON_API_Commands::PSCEN
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
												" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7)
					),
					//Effect Level **:00 to 15 by ASCII , 00=0dB, 10=10dB can be operated from 1 to 15
					DENON_API_Commands::PSEFF
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
												" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7, " 075" => 7.5, " 08" => 8, " 085" => 8.5, " 09" => 9, " 095" => 9.5,
												" 10" => 10, " 105" => 10.5, " 11" => 11, " 115" => 11.5, " 12" => 12, " 125" => 12.5, " 13" => 13, " 135" => 13.5, " 14" => 14, " 145" => 14.5, " 15" => 15)
					),
					//Center Image **:00 to 10 by ASCII , 00=0.0 can be operated from 0.0 to 1.0
					DENON_API_Commands::PSCEI
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 00" => 0, " 01" => 0.1, " 02" => 0.2, " 03" => 0.3, " 04" => 0.4, " 05" => 0.5, " 06" => 0.6, " 07" => 0.7, " 08" => 0.8, " 09" => 0.9, " 10" => 1.0)
					),
					//Contrast **:44 to 56 by ASCII , 50=0 can be operated from -6 to +6(44 to 56)
					DENON_API_Commands::PVCN
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6)
					),
					//Brightness **:00 to 12 by ASCII , 00=0 can be operated from 0 to 12
					DENON_API_Commands::PVBR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
												" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7, " 075" => 7.5, " 08" => 8, " 085" => 8.5, " 09" => 9, " 095" => 9.5,
												" 10" => 10, " 105" => 10.5, " 11" => 11, " 115" => 11.5, " 12" => 12)
					),
					//Chroma Level **:44 to 56 by ASCII , 50=0 can be operated from -6 to +6(44 to 56)
					DENON_API_Commands::PVCM
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6)
					),
					//Hue **:44 to 56 by ASCII , 50=0 can be operated from -6 to +6(44 to 56)
					DENON_API_Commands::PVHUE
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6)
					),
					//Enhancer **:00 to 12 by ASCII, 00=0 can be operated from 0 to 12
					DENON_API_Commands::PVENH
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 00" => 0, " 005" => 0.5, " 01" => 1, " 015" => 1.5, " 02" => 2, " 025" => 2.5, " 03" => 3, " 035" => 3.5, " 04" => 4, " 045" => 4.5,
												" 05" => 5, " 055" => 5.5, " 06" => 6, " 065" => 6.5, " 07" => 7, " 075" => 7.5, " 08" => 8, " 085" => 8.5, " 09" => 9, " 095" => 9.5,
												" 10" => 10, " 105" => 10.5, " 11" => 11, " 115" => 11.5, " 12" => 12)
					),
					//Stage Height **:40 to 60 by ASCII , 50=0dB can be operated from -10 to +10
					DENON_API_Commands::PSSTH
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5, " 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5,
												" 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5, " 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5,
												" 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5, " 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5,
												" 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8, " 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10)
					),
					//Stage Width **:40 to 60 by ASCII , 50=0dB can be operated from -10 to +10
					DENON_API_Commands::PSSTW
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5, " 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5,
												" 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5, " 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5,
												" 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5, " 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5,
												" 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8, " 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10)
					),
					//Zone 2
					//Zone 2 Volume **:00 to 99 by ASCII , 80=0dB, 99=---(MIN) 00=-80dB
					DENON_API_Commands::Z2
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(
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
												)
					),
					//Zone 2 Channel Volume FL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::Z2CVFL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
								
					),
					//Zone 2 Channel Volume FR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::Z2CVFR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Zone 3
					//Zone 3 Volume **:00 to 99 by ASCII , 80=0dB, 99=---(MIN) 00=-80dB
					DENON_API_Commands::Z3
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array
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
									)
					),
					//Zone 3 Channel Volume FL **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::Z3CVFL
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					),
					//Zone 3 Channel Volume FR **:38 to 62 by ASCII , 50=0dB
					DENON_API_Commands::Z3CVFR
					=> array(
						"VarType" => DENONIPSVarType::vtFloat,
						"ValueMapping" => array(" 38" => -12, " 385" => -11.5, " 39" => -11, " 395" => -10.5, " 40" => -10, " 405" => -9.5, " 41" => -9, " 415" => -8.5, " 42" => -8, " 425" => -7.5,
												" 43" => -7, " 435" => -6.5, " 44" => -6, " 445" => -5.5, " 45" => -5, " 455" => -4.5, " 46" => -4, " 465" => -3.5, " 47" => -3, " 475" => -2.5,
												" 48" => -2, " 485" => -1.5, " 49" => -1, " 495" => -0.5, " 50" => 0, " 505" => 0.5, " 51" => 1, " 515" => 1.5, " 52" => 2, " 525" => 2.5,
												" 53" => 3, " 535" => 3.5, " 54" => 4, " 545" => 4.5, " 55" => 5, " 555" => 5.5, " 56" => 6, " 565" => 6.5, " 57" => 7, " 575" => 7.5, " 58" => 8,
												" 585" => 8.5, " 59" => 9, " 595" => 9.5, " 60" => 10, " 605" => 10.5, " 61" => 11, " 615" => 11.5, " 62" => 12)
					)
				);

    public function GetDataFromJSONObject($Data)
    {
        $this->APICommand = $Data->APICommand;
        $this->Data = utf8_decode($Data->Data);
        if (property_exists($Data, 'APISubCommand'))
            $this->APISubCommand = $Data->APISubCommand;
    }

    public function ToJSONString($GUID)
    {
        $SendData = new stdClass;
        $SendData->DataID = $GUID;
        $SendData->APICommand = $this->APICommand;
        $SendData->Data = utf8_encode($this->Data);
//        if (is_array($this->APISubCommand))
//        if ($this->APISubCommand <> null)        
        $SendData->APISubCommand = $this->APISubCommand;
        return json_encode($SendData);
    }
	
	public function GetSubCommand($Ident, $Value) 
    {
		if (array_key_exists($Ident, $this->VarMapping))
        {
			foreach($this->VarMapping as $Command => $ValMap)
			{
				if($Command == $Ident)
				{
				    $ValueMapping = $ValMap["ValueMapping"];
				    foreach($ValueMapping as $SubCommand => $SubCommandValue)
				    {
						if($SubCommandValue == $Value)
							{
								return $SubCommand;
							}
					}
				}
			}
        }
        else
            return null;
    }
	
	public function GetCommandResponse ($data)
	{
		$datavalues = array();
		foreach($data as $key => $response)
			{
				$pos = stripos($response, "PSCINEMA EQ");
				if($pos !== false)
				{
					$data = str_replace("PSCINEMA EQ", "PSCINEMA_EQ", $data);
				}
				$pos1 = stripos($response, "PSTONE CTRL");
				if($pos1 !== false)
				{
					$data = str_replace("PSTONE CTRL", "PSTONE_CTRL", $data);
				}

				foreach($this->VarMapping as $Command => $ValMap)
				{
					$pos = stripos($response, $Command);
					if ($pos !== false)
					{
						$lengthCommand = strlen($Command);
						$ResponseSubCommand = substr($response, $lengthCommand);
						$ValueMapping = $ValMap["ValueMapping"];
						$VarType = $ValMap["VarType"];
						foreach($ValueMapping as $SubCommand => $SubCommandValue)
						{
							if($SubCommand == $ResponseSubCommand)
								{
									$Ident = $Command; //Ident enthält _
									$datavalues[$Ident] =  array('VarType' => $VarType, 'Value' => $SubCommandValue, 'Subcommand' => $ResponseSubCommand);
								}
						}
						
					}
				}
			}
		$datasend = array(
			'ResponseType' => 'TELNET',
			'Data' => $datavalues
			);
			
		return $datasend;	
	}
	
    public function GetMapping()
    {
        $this->Mapping = DENON_API_Data_Mapping::GetMapping($this->APICommand);
    }

    public function GetSubCommandold()
    {
//        IPS_LogMessage('GetSubCommand', print_r(ISCP_API_Command_Mapping::GetMapping($this->APICommand), 1));
        $this->APISubCommand = (object) DENON_API_Command_Mapping::GetMapping($this->APICommand);
    }

}





?>