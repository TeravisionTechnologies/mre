<?php

date_default_timezone_set( 'America/New_York' );

function get_mls() {
	global $wpdb;
	$agentids = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", '_ag_mls' ) );
	$config   = new \PHRETS\Configuration;
	$config->setLoginUrl( 'http://rets.sef.mlsmatrix.com/Rets/Login.ashx' )
	       ->setUsername( 'lesAERfue' )
	       ->setPassword( '8050' )
	       ->setRetsVersion( '1.7.2' );

	$rets = new \PHRETS\Session( $config );

	$connect = $rets->Login();

	if ( $connect ) {
		$results = $rets->Search(
			'Property',
			'Listing',
			'(STATUS = A), ((CoListAgentMLSID = 3196679) | (CoListAgentMLSID = 3124638) | (AgentLicenseNum = 3196679) | (AgentLicenseNum = 3124638))',
			[
				'Format' => 'COMPACT-DECODED',
				//'Limit'  => 5,
				//'Offset' => 0
			]
		);
	} else {
		$error = $rets->Error();
		print_r( $error );
	}

	foreach ( $results as $property ) {

		global $polylang;
		$transaction = "";
		$rooms       = "";
		$owner       = "";
		if ( $property['ForSaleYN'] == "0" ) {
			$transaction = 'Lease';
		} else {
			$transaction = 'Sale';
		}
		if ( $property['BedsTotal'] == "" ) {
			$rooms = '0';
		} else {
			$rooms = $property['BedsTotal'];
		}
		if ( in_array( $property['CoListAgentMLSID'], $agentids ) || in_array( $property['AgentLicenseNum'], $agentids ) ) {
			$owner = "HR19";
		} else {
			$owner = "Other";
		}

		if ( $property['CoListAgentMLSID'] == "" ){
			$brokerId = $property['AgentLicenseNum'];
		} else{
			$brokerId = $property['CoListAgentMLSID'];
		}

		$propid = get_page_by_title( $property['MLSNumber'], 'OBJECT', 'property' ); //Check if already exists

		if ( ! $propid ) {
			$post_args          = array(
				'post_title'   => $property['MLSNumber'],
				'post_content' => $property['Remarks'],
				'post_status'  => 'publish',
				'post_type'    => 'property',
				'meta_input'   => array(
					'_pr_address'                     => $property['StreetNumber'] . ' ' . $property['StreetName'] . ' ' . $property['UnitNumber'] . ' ' . $property['City'] . ' ' . $property['StateOrProvince'],
					'_pr_state'                       => $property['StateOrProvince'],
					'_pr_city'                        => $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_community'                   => $property['CountyOrParish'],
					'_pr_subdiv'                      => $property['SubdivisionName'],
					'_pr_current_price'               => round( $property['CurrentPrice'] ),
					'_pr_type_of_property'            => $property['TypeofProperty'],
					'_pr_room_count'                  => $property['BedsTotal'],
					'_pr_baths_total'                 => number_format( round( $property['BathsTotal'] ) ),
					'_pr_baths_full'                  => number_format( round( $property['BathsFull'] ) ),
					'_pr_baths_half'                  => number_format( round( $property['BathsHalf'] ) ),
					'_pr_sqft'                        => number_format( round( $property['SqFtTotal'] ) ),
					'_pr_surf'                        => number_format( round( $property['TotalAcreage'] ) ),
					'_pr_hoa'                         => number_format( round( $property['AssociationFee'] ) ),
					'_pr_yearbuilt'                   => number_format( round( $property['YearBuilt'] ) ),
					'_pr_agentid'                     => $brokerId,
					'_pr_matrixid'                    => $property['Matrix_Unique_ID'],
					'_pr_status'                      => $property['Status'],
					'_pr_forsale'                     => $property['ForSaleYN'],
					'_pr_forlease'                    => $property['ForLeaseYN'],
					'_pr_postalcode'                  => $property['PostalCode'] . ', ' . $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_transaction'                 => $transaction,
					'_pr_owner'                       => $owner,
					'_pr_ActiveOpenHouseCount'        => $property['ActiveOpenHouseCount'],
					'_pr_AddlMoveInCostYN'            => $property['AddlMoveInCostYN'],
					'_pr_AdjustedAreaSF'              => $property['AdjustedAreaSF'],
					'_pr_AgentAlternatePhone'         => $property['AgentAlternatePhone'],
					'_pr_AgentsOfficeExtension'       => $property['AgentsOfficeExtension'],
					'_pr_Amenities'                   => $property['Amenities'],
					'_pr_ApplicationFee'              => $property['ApplicationFee'],
					'_pr_ApprovalInformation'         => $property['ApprovalInformation'],
					'_pr_ApproximateLotSize'          => $property['ApproximateLotSize'],
					'_pr_ApproxSqftTotalArea'         => $property['ApproxSqftTotalArea'],
					'_pr_AssocFeePaidPer'             => $property['AssocFeePaidPer'],
					'_pr_AssociationFee'              => $property['AssociationFee'],
					'_pr_AvailableDate'               => $property['AvailableDate'],
					'_pr_BalconyPorchandorPatioYN'    => $property['BalconyPorchandorPatioYN'],
					'_pr_BedroomDescription'          => $property['BedroomDescription'],
					'_pr_BoatDockAccommodates'        => $property['BoatDockAccommodates'],
					'_pr_BoatServices'                => $property['BoatServices'],
					'_pr_BrokerRemarks'               => $property['BrokerRemarks'],
					'_pr_BuildingIncludes'            => $property['BuildingIncludes'],
					'_pr_BuildingNameNumber'          => $property['BuildingNameNumber'],
					'_pr_CableAvailableYN'            => $property['CableAvailableYN'],
					'_pr_CeilingHeight'               => $property['CeilingHeight'],
					'_pr_CloseDate'                   => $property['CloseDate'],
					'_pr_CoListAgentDirectWorkPhone'  => $property['CoListAgentDirectWorkPhone'],
					'_pr_CoListAgentEmail'            => $property['CoListAgentEmail'],
					'_pr_CoListAgentFullName'         => $property['CoListAgentFullName'],
					'_pr_CommonAreaMaintAmount'       => $property['CommonAreaMaintAmount'],
					'_pr_CommonAreaMaintIncludes'     => $property['CommonAreaMaintIncludes'],
					'_pr_ComplexName'                 => $property['ComplexName'],
					'_pr_ConstructionType'            => $property['ConstructionType'],
					'_pr_CoolingDescription'          => $property['CoolingDescription'],
					'_pr_CostofSales'                 => $property['CostofSales'],
					'_pr_Development'                 => $property['Development'],
					'_pr_DevelopmentName'             => $property['DevelopmentName'],
					'_pr_DiningAreaDimensions'        => $property['DiningAreaDimensions'],
					'_pr_DiningDescription'           => $property['DiningDescription'],
					'_pr_DiningRoomDimensions'        => $property['DiningRoomDimensions'],
					'_pr_Dom'                         => $property['DOM'],
					'_pr_ExpInclElectricYN'           => $property['ExpInclElectricYN'],
					'_pr_ExpirationDate'              => $property['ExpirationDate'],
					'_pr_ExteriorFeatures'            => $property['ExteriorFeatures'],
					'_pr_FeeDescription'              => $property['FeeDescription'],
					'_pr_FloodZone'                   => $property['FloodZone'],
					'_pr_FloorDescription'            => $property['FloorDescription'],
					'_pr_FurnAnnualRent'              => $property['FurnAnnualRent'],
					'_pr_HeatingDescription'          => $property['HeatingDescription'],
					'_pr_InteriorFeatures'            => $property['InteriorFeatures'],
					'_pr_InternetRemarks'             => $property['InternetRemarks'],
					'_pr_InternetYN'                  => $property['InternetYN'],
					'_pr_LeaseTermInfo'               => $property['LeaseTermInfo'],
					'_pr_LegalDescription'            => $property['LegalDescription'],
					'_pr_ListAgentDirectWorkPhone'    => $property['ListAgentDirectWorkPhone'],
					'_pr_ListAgentEmail'              => $property['ListAgentEmail'],
					'_pr_ListAgentFullName'           => $property['ListAgentFullName'],
					'_pr_ListingType'                 => $property['ListingType'],
					'_pr_ListOfficePhone'             => $property['ListOfficePhone'],
					'_pr_ListPrice'                   => $property['ListPrice'],
					'_pr_LocationofProperty'          => $property['LocationofProperty'],
					'_pr_LotDescription'              => $property['LotDescription'],
					'_pr_MainLivingArea'              => $property['MainLivingArea'],
					'_pr_MaintenanceChargeMonth'      => $property['MaintenanceChargeMonth'],
					'_pr_MaintenanceFeeIncludes'      => $property['MaintenanceFeeIncludes'],
					'_pr_MaintenanceIncludes'         => $property['MaintenanceIncludes'],
					'_pr_MaintFeePaidPer'             => $property['MaintFeePaidPer'],
					'_pr_ManagementCompany'           => $property['ManagementCompany'],
					'_pr_ManagementCompanyPhone'      => $property['ManagementCompanyPhone'],
					'_pr_ManagementExpense'           => $property['ManagementExpense'],
					'_pr_MasterBathroomDescription'   => $property['MasterBathroomDescription'],
					'_pr_MinimumLeasePeriod'          => $property['MinimumLeasePeriod'],
					'_pr_MinimumNumofDaysforLease'    => $property['MinimumNumofDaysforLease'],
					'_pr_Miscellaneous'               => $property['Miscellaneous'],
					'_pr_NumFloors'                   => $property['NumFloors'],
					'_pr_NumGarageSpaces'             => $property['NumGarageSpaces'],
					'_pr_NumOffices'                  => $property['NumOffices'],
					'_pr_NumParcels'                  => $property['NumParcels'],
					'_pr_NumParkingSpaces'            => $property['NumParkingSpaces'],
					'_pr_NumStories'                  => $property['NumStories'],
					'_pr_OfficeFaxNumber'             => $property['OfficeFaxNumber'],
					'_pr_OnSiteUtilities'             => $property['OnSiteUtilities'],
					'_pr_OriginalListPrice'           => $property['OriginalListPrice'],
					'_pr_ParcelNumber'                => $property['ParcelNumber'],
					'_pr_ParkingDescription'          => $property['ParkingDescription'],
					'_pr_PatioBalconyDimensions'      => $property['PatioBalconyDimensions'],
					'_pr_PetRestrictions'             => $property['PetRestrictions'],
					'_pr_PetsAllowedYN'               => $property['PetsAllowedYN'],
					'_pr_PoolYN'                      => $property['PoolYN'],
					'_pr_PropertyTypeInformation'     => $property['PropertyTypeInformation'],
					'_pr_PropTypeTypeofBuilding'      => $property['PropTypeTypeofBuilding'],
					'_pr_RentalDepositIncludes'       => $property['RentalDepositIncludes'],
					'_pr_RentalPaymentIncludes'       => $property['RentalPaymentIncludes'],
					'_pr_Restrictions'                => $property['Restrictions'],
					'_pr_Roof'                        => $property['Roof'],
					'_pr_SaleTerms'                   => $property['SaleTerms'],
					'_pr_SecurityInformation'         => $property['SecurityInformation'],
					'_pr_SellingAgentDirectWorkPhone' => $property['SellingAgentDirectWorkPhone'],
					'_pr_SellingAgentEmail'           => $property['SellingAgentEmail'],
					'_pr_SellingAgentFullName'        => $property['SellingAgentFullName'],
					'_pr_SellingOfficeName'           => $property['SellingOfficeName'],
					'_pr_SellingOfficePhone'          => $property['SellingOfficePhone'],
					'_pr_ShowingInstructions'         => $property['ShowingInstructions'],
					'_pr_SqFtLivArea'                 => $property['SqFtLivArea'],
					'_pr_SpaYN'                       => $property['SpaYN'],
					'_pr_Style'                       => $property['Style'],
					'_pr_StyleofBusiness'             => $property['StyleofBusiness'],
					'_pr_StyleofProperty'             => $property['StyleofProperty'],
					'_pr_SubdivisionComplexBldg'      => $property['SubdivisionComplexBldg'],
					'_pr_TenantPays'                  => $property['TenantPays'],
					'_pr_TotalExpenses'               => $property['TotalExpenses'],
					'_pr_TotalNumofUnitsInBuildin'    => $property['TotalNumofUnitsInBuildin'],
					'_pr_TotalNumofUnitsInComplex'    => $property['TotalNumofUnitsInComplex'],
					'_pr_TypeofAssociation'           => $property['TypeofAssociation'],
					'_pr_TypeofBusiness'              => $property['TypeofBusiness'],
					'_pr_UnitNumber'                  => $property['UnitNumber'],
					'_pr_UnitView'                    => $property['UnitView'],
					'_pr_UtilitiesAvailable'          => $property['UtilitiesAvailable'],
					'_pr_UtilityExpense'              => $property['UtilityExpense'],
					'_pr_VirtualTour'                 => $property['VirtualTour'],
					'_pr_WaterAccess'                 => $property['WaterAccess'],
					'_pr_WaterfrontDescription'       => $property['WaterfrontDescription'],
					'_pr_WaterfrontPropertyYN'        => $property['WaterfrontPropertyYN'],
					'_pr_WaterView'                   => $property['WaterView'],
					'_pr_EquipmentAppliances'         => $property['EquipmentAppliances'],
					'_pr_TaxAmount'                   => round( $property['TaxAmount'] ),
					'_pr_TotalMortgage'               => round( $property['TotalMortgage'] ),
				)
			);
			$posted_propertyEsp = wp_insert_post( $post_args );
			PLL()->model->post->set_language( $posted_propertyEsp, 'es' );

			$posted_propertyEng = wp_insert_post( $post_args );
			PLL()->model->post->set_language( $posted_propertyEng, 'en' );
			PLL()->model->post->save_translations( $posted_propertyEsp, array( 'en' => $posted_propertyEng ) );

			$sysid  = $property['Matrix_Unique_ID'];
			$n      = 1;
			$url    = wp_upload_dir();
			$upload = $url['basedir'];
			$dir    = $upload . '/photos/' . $sysid;
			if ( ! file_exists( $dir ) ) {
				wp_mkdir_p( $dir );
			}
			$objects = $rets->GetObject( 'Property', 'HighRes', $sysid );
			foreach ( $objects as $object ) {
				file_put_contents( $dir . '/' . $n . '.jpg', $object->getContent() );
				$n ++;
			}

		} else {

			$post_args       = array(
				'ID'           => $propid->ID,
				'post_title'   => $property['MLSNumber'],
				'post_content' => $property['Remarks'],
				'post_status'  => 'publish',
				'post_type'    => 'property',
				'meta_input'   => array(
					'_pr_address'                     => $property['StreetNumber'] . ' ' . $property['StreetName'] . ' ' . $property['UnitNumber'] . ' ' . $property['City'] . ' ' . $property['StateOrProvince'],
					'_pr_state'                       => $property['StateOrProvince'],
					'_pr_city'                        => $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_community'                   => $property['CountyOrParish'],
					'_pr_subdiv'                      => $property['SubdivisionName'],
					'_pr_current_price'               => round( $property['CurrentPrice'] ),
					'_pr_type_of_property'            => $property['TypeofProperty'],
					'_pr_room_count'                  => $rooms,
					'_pr_baths_total'                 => number_format( round( $property['BathsTotal'] ) ),
					'_pr_baths_full'                  => number_format( round( $property['BathsFull'] ) ),
					'_pr_baths_half'                  => number_format( round( $property['BathsHalf'] ) ),
					'_pr_sqft'                        => number_format( round( $property['SqFtTotal'] ) ),
					'_pr_surf'                        => number_format( round( $property['TotalAcreage'] ) ),
					'_pr_hoa'                         => number_format( round( $property['AssociationFee'] ) ),
					'_pr_yearbuilt'                   => number_format( round( $property['YearBuilt'] ) ),
					'_pr_agentid'                     => $brokerId,
					'_pr_matrixid'                    => $property['Matrix_Unique_ID'],
					'_pr_status'                      => $property['Status'],
					'_pr_forsale'                     => $property['ForSaleYN'],
					'_pr_forlease'                    => $property['ForLeaseYN'],
					'_pr_postalcode'                  => $property['PostalCode'] . ', ' . $property['City'] . ', ' . $property['StateOrProvince'],
					'_pr_transaction'                 => $transaction,
					'_pr_owner'                       => $owner,
					'_pr_ActiveOpenHouseCount'        => $property['ActiveOpenHouseCount'],
					'_pr_AddlMoveInCostYN'            => $property['AddlMoveInCostYN'],
					'_pr_AdjustedAreaSF'              => $property['AdjustedAreaSF'],
					'_pr_AgentAlternatePhone'         => $property['AgentAlternatePhone'],
					'_pr_AgentsOfficeExtension'       => $property['AgentsOfficeExtension'],
					'_pr_Amenities'                   => $property['Amenities'],
					'_pr_ApplicationFee'              => $property['ApplicationFee'],
					'_pr_ApprovalInformation'         => $property['ApprovalInformation'],
					'_pr_ApproximateLotSize'          => $property['ApproximateLotSize'],
					'_pr_ApproxSqftTotalArea'         => $property['ApproxSqftTotalArea'],
					'_pr_AssocFeePaidPer'             => $property['AssocFeePaidPer'],
					'_pr_AssociationFee'              => $property['AssociationFee'],
					'_pr_AvailableDate'               => $property['AvailableDate'],
					'_pr_BalconyPorchandorPatioYN'    => $property['BalconyPorchandorPatioYN'],
					'_pr_BedroomDescription'          => $property['BedroomDescription'],
					'_pr_BoatDockAccommodates'        => $property['BoatDockAccommodates'],
					'_pr_BoatServices'                => $property['BoatServices'],
					'_pr_BrokerRemarks'               => $property['BrokerRemarks'],
					'_pr_BuildingIncludes'            => $property['BuildingIncludes'],
					'_pr_BuildingNameNumber'          => $property['BuildingNameNumber'],
					'_pr_CableAvailableYN'            => $property['CableAvailableYN'],
					'_pr_CeilingHeight'               => $property['CeilingHeight'],
					'_pr_CloseDate'                   => $property['CloseDate'],
					'_pr_CoListAgentDirectWorkPhone'  => $property['CoListAgentDirectWorkPhone'],
					'_pr_CoListAgentEmail'            => $property['CoListAgentEmail'],
					'_pr_CoListAgentFullName'         => $property['CoListAgentFullName'],
					'_pr_CommonAreaMaintAmount'       => $property['CommonAreaMaintAmount'],
					'_pr_CommonAreaMaintIncludes'     => $property['CommonAreaMaintIncludes'],
					'_pr_ComplexName'                 => $property['ComplexName'],
					'_pr_ConstructionType'            => $property['ConstructionType'],
					'_pr_CoolingDescription'          => $property['CoolingDescription'],
					'_pr_CostofSales'                 => $property['CostofSales'],
					'_pr_Development'                 => $property['Development'],
					'_pr_DevelopmentName'             => $property['DevelopmentName'],
					'_pr_DiningAreaDimensions'        => $property['DiningAreaDimensions'],
					'_pr_DiningDescription'           => $property['DiningDescription'],
					'_pr_DiningRoomDimensions'        => $property['DiningRoomDimensions'],
					'_pr_Dom'                         => $property['DOM'],
					'_pr_ExpInclElectricYN'           => $property['ExpInclElectricYN'],
					'_pr_ExpirationDate'              => $property['ExpirationDate'],
					'_pr_ExteriorFeatures'            => $property['ExteriorFeatures'],
					'_pr_FeeDescription'              => $property['FeeDescription'],
					'_pr_FloodZone'                   => $property['FloodZone'],
					'_pr_FloorDescription'            => $property['FloorDescription'],
					'_pr_FurnAnnualRent'              => $property['FurnAnnualRent'],
					'_pr_HeatingDescription'          => $property['HeatingDescription'],
					'_pr_InteriorFeatures'            => $property['InteriorFeatures'],
					'_pr_InternetRemarks'             => $property['InternetRemarks'],
					'_pr_InternetYN'                  => $property['InternetYN'],
					'_pr_LeaseTermInfo'               => $property['LeaseTermInfo'],
					'_pr_LegalDescription'            => $property['LegalDescription'],
					'_pr_ListAgentDirectWorkPhone'    => $property['ListAgentDirectWorkPhone'],
					'_pr_ListAgentEmail'              => $property['ListAgentEmail'],
					'_pr_ListAgentFullName'           => $property['ListAgentFullName'],
					'_pr_ListingType'                 => $property['ListingType'],
					'_pr_ListOfficePhone'             => $property['ListOfficePhone'],
					'_pr_ListPrice'                   => $property['ListPrice'],
					'_pr_LocationofProperty'          => $property['LocationofProperty'],
					'_pr_LotDescription'              => $property['LotDescription'],
					'_pr_MainLivingArea'              => $property['MainLivingArea'],
					'_pr_MaintenanceChargeMonth'      => $property['MaintenanceChargeMonth'],
					'_pr_MaintenanceFeeIncludes'      => $property['MaintenanceFeeIncludes'],
					'_pr_MaintenanceIncludes'         => $property['MaintenanceIncludes'],
					'_pr_MaintFeePaidPer'             => $property['MaintFeePaidPer'],
					'_pr_ManagementCompany'           => $property['ManagementCompany'],
					'_pr_ManagementCompanyPhone'      => $property['ManagementCompanyPhone'],
					'_pr_ManagementExpense'           => $property['ManagementExpense'],
					'_pr_MasterBathroomDescription'   => $property['MasterBathroomDescription'],
					'_pr_MinimumLeasePeriod'          => $property['MinimumLeasePeriod'],
					'_pr_MinimumNumofDaysforLease'    => $property['MinimumNumofDaysforLease'],
					'_pr_Miscellaneous'               => $property['Miscellaneous'],
					'_pr_NumFloors'                   => $property['NumFloors'],
					'_pr_NumGarageSpaces'             => $property['NumGarageSpaces'],
					'_pr_NumOffices'                  => $property['NumOffices'],
					'_pr_NumParcels'                  => $property['NumParcels'],
					'_pr_NumParkingSpaces'            => $property['NumParkingSpaces'],
					'_pr_NumStories'                  => $property['NumStories'],
					'_pr_OfficeFaxNumber'             => $property['OfficeFaxNumber'],
					'_pr_OnSiteUtilities'             => $property['OnSiteUtilities'],
					'_pr_OriginalListPrice'           => $property['OriginalListPrice'],
					'_pr_ParcelNumber'                => $property['ParcelNumber'],
					'_pr_ParkingDescription'          => $property['ParkingDescription'],
					'_pr_PatioBalconyDimensions'      => $property['PatioBalconyDimensions'],
					'_pr_PetRestrictions'             => $property['PetRestrictions'],
					'_pr_PetsAllowedYN'               => $property['PetsAllowedYN'],
					'_pr_PoolYN'                      => $property['PoolYN'],
					'_pr_PropertyTypeInformation'     => $property['PropertyTypeInformation'],
					'_pr_PropTypeTypeofBuilding'      => $property['PropTypeTypeofBuilding'],
					'_pr_RentalDepositIncludes'       => $property['RentalDepositIncludes'],
					'_pr_RentalPaymentIncludes'       => $property['RentalPaymentIncludes'],
					'_pr_Restrictions'                => $property['Restrictions'],
					'_pr_Roof'                        => $property['Roof'],
					'_pr_SaleTerms'                   => $property['SaleTerms'],
					'_pr_SecurityInformation'         => $property['SecurityInformation'],
					'_pr_SellingAgentDirectWorkPhone' => $property['SellingAgentDirectWorkPhone'],
					'_pr_SellingAgentEmail'           => $property['SellingAgentEmail'],
					'_pr_SellingAgentFullName'        => $property['SellingAgentFullName'],
					'_pr_SellingOfficeName'           => $property['SellingOfficeName'],
					'_pr_SellingOfficePhone'          => $property['SellingOfficePhone'],
					'_pr_ShowingInstructions'         => $property['ShowingInstructions'],
					'_pr_SqFtLivArea'                 => $property['SqFtLivArea'],
					'_pr_SpaYN'                       => $property['SpaYN'],
					'_pr_Style'                       => $property['Style'],
					'_pr_StyleofBusiness'             => $property['StyleofBusiness'],
					'_pr_StyleofProperty'             => $property['StyleofProperty'],
					'_pr_SubdivisionComplexBldg'      => $property['SubdivisionComplexBldg'],
					'_pr_TenantPays'                  => $property['TenantPays'],
					'_pr_TotalExpenses'               => $property['TotalExpenses'],
					'_pr_TotalNumofUnitsInBuildin'    => $property['TotalNumofUnitsInBuildin'],
					'_pr_TotalNumofUnitsInComplex'    => $property['TotalNumofUnitsInComplex'],
					'_pr_TypeofAssociation'           => $property['TypeofAssociation'],
					'_pr_TypeofBusiness'              => $property['TypeofBusiness'],
					'_pr_UnitNumber'                  => $property['UnitNumber'],
					'_pr_UnitView'                    => $property['UnitView'],
					'_pr_UtilitiesAvailable'          => $property['UtilitiesAvailable'],
					'_pr_UtilityExpense'              => $property['UtilityExpense'],
					'_pr_VirtualTour'                 => $property['VirtualTour'],
					'_pr_WaterAccess'                 => $property['WaterAccess'],
					'_pr_WaterfrontDescription'       => $property['WaterfrontDescription'],
					'_pr_WaterfrontPropertyYN'        => $property['WaterfrontPropertyYN'],
					'_pr_WaterView'                   => $property['WaterView'],
					'_pr_EquipmentAppliances'         => $property['EquipmentAppliances'],
					'_pr_TaxAmount'                   => round( $property['TaxAmount'] ),
					'_pr_TotalMortgage'               => round( $property['TotalMortgage'] ),
				),
			);
			$posted_property = wp_update_post( $post_args );
			//PLL()->sync_post->copy_post( $propid->ID, 'en', true );

			/*$posted_propertyEsp = wp_insert_post( $post_args );
			PLL()->model->post->set_language($posted_propertyEsp, 'es');

			$posted_propertyEng = wp_insert_post( $post_args );
			PLL()->model->post->set_language($posted_propertyEng, 'en');
			PLL()->model->post->save_translations($posted_propertyEsp, array('en' => $posted_propertyEng));*/

			$sysid  = $property['Matrix_Unique_ID'];
			$n      = 1;
			$url    = wp_upload_dir();
			$upload = $url['basedir'];
			$dir    = $upload . '/photos/' . $sysid;
			if ( ! file_exists( $dir ) ) {
				wp_mkdir_p( $dir );
			}
			$objects = $rets->GetObject( 'Property', 'HighRes', $sysid );
			foreach ( $objects as $object ) {
				file_put_contents( $dir . '/' . $n . '.jpg', $object->getContent() );
				$n ++;
			}
		}
	}

	$rets->Disconnect();
}

/*add_action( 'get_mls_properties', 'get_mls' );*/
