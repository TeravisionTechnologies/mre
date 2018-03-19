<?php

function property_metaboxes() {

	$prefix = '_pr_';

	$cmb_property = new_cmb2_box(
		array(
			'id'           => 'propertyinfo',
			'title'        => __( 'Property Extra Information' ),
			'object_types' => 'property',
			'context'      => 'normal',
			'priority'     => 'high'
		)
	);

	$cmb_property->add_field( array(
		'name'             => __( 'Owner' ),
		'id'               => $prefix . 'owner',
		'type'             => 'select',
		'show_option_none' => false,
		'default'          => 'custom',
		'options'          => array(
			'HR19'  => __( 'HR19', 'hr' ),
			'Other' => __( 'Other', 'hr' ),
		),
		'desc'             => 'Set the owner of this property'
	) );

	$cmb_property->add_field( array(
		'name'             => __( 'Transaction' ),
		'id'               => $prefix . 'transaction',
		'type'             => 'select',
		'show_option_none' => false,
		'default'          => 'custom',
		'options'          => array(
			'Presale' => __( 'Presale', 'hr' ),
			'Sale'    => __( 'Sale', 'hr' ),
			'Lease'   => __( 'Lease', 'hr' ),
		),
		'desc'             => 'Type of transaction (Sale / Lease / Presale)'
	) );

	$cmb_property->add_field( array(
		'name'             => 'Country',
		'desc'             => 'Select a country',
		'id'               => $prefix . 'country',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => array(
			'usa'   => __( 'USA', 'hr' ),
			'spain' => __( 'Spain', 'hr' ),
		),
	) );

	$cmb_property->add_field( array(
		'name' => __( 'State' ),
		'id'   => $prefix . 'state',
		'type' => 'text',
		'desc' => 'The state where the property is located, e.g FL'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'City' ),
		'id'   => $prefix . 'city',
		'type' => 'text',
		'desc' => 'The city where the property is located, e.g Miami, FL'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Community' ),
		'id'   => $prefix . 'community',
		'type' => 'text',
		'desc' => 'The community where the property is located, e.g Palm Beach County'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Subdivision' ),
		'id'   => $prefix . 'subdiv',
		'type' => 'text',
		'desc' => 'The subdivision where the property is located, e.g Jupiter Inlet Colony'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Address' ),
		'id'   => $prefix . 'address',
		'type' => 'text',
		'desc' => 'The full address where the property is located, e.g 8950 SW 74 CT 2230 Miami, FL'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'ZIP Code' ),
		'id'   => $prefix . 'postalcode',
		'type' => 'text',
	) );

	$cmb_property->add_field(
		array(
			'name' => __( 'Property Price' ),
			'id'   => $prefix . 'current_price',
			'type' => 'text',
			'desc' => 'The current price of the property, e.g 1000000'
		)
	);

	$cmb_property->add_field(
		array(
			'name' => __( 'Currency Symbol' ),
			'id'   => $prefix . 'currency_symbol',
			'type' => 'text',
			'desc' => 'The currency symbol, leave empty for USD Dollars (default), e.g €, £, ¥'
		)
	);

	$cmb_property->add_field( array(
		'name' => __( 'Type of Property' ),
		'id'   => $prefix . 'type_of_property',
		'type' => 'text',
		'desc' => 'The type of property, eg. Residential, Condo',
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Rooms' ),
		'id'   => $prefix . 'room_count',
		'type' => 'text',
		'desc' => 'Total number of rooms, e.g 6'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Baths' ),
		'id'   => $prefix . 'baths_total',
		'type' => 'text',
		'desc' => 'Total number of baths (full and halfs), e.g 3'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Baths Full' ),
		'id'   => $prefix . 'baths_full',
		'type' => 'text',
		'desc' => 'Total number of full baths, e.g 2'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Baths Half' ),
		'id'   => $prefix . 'baths_half',
		'type' => 'text',
		'desc' => 'Total number of half baths, e.g 1'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Square FT' ),
		'id'   => $prefix . 'sqft',
		'type' => 'text',
		'desc' => 'Total Square FT, e.g 718'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Surface' ),
		'id'   => $prefix . 'surf',
		'type' => 'text',
		'desc' => 'Total area, e.g 3477'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'HOA Fees' ),
		'id'   => $prefix . 'hoa',
		'type' => 'text',
		'desc' => 'Total HOA amount fee  e.g 20'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Year Built' ),
		'id'   => $prefix . 'yearbuilt',
		'type' => 'text',
		'desc' => 'Construction year of the property e.g 2016'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Agent ID' ),
		'id'   => $prefix . 'agentid',
		'type' => 'text',
		'desc' => 'The agent/broker Realtor (to match listed properties) ID e.g 3196633'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Matrix ID' ),
		'id'   => $prefix . 'matrixid',
		'type' => 'text',
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Status' ),
		'id'   => $prefix . 'status',
		'type' => 'text',
		'desc' => 'The status of the property, e.g Active, Pending, Under Construction'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Tax Amount' ),
		'id'   => $prefix . 'TaxAmount',
		'type' => 'text',
		'desc' => 'Total amount of taxes, e.g 130'
	) );

	$cmb_property->add_field( array(
		'name' => __( 'Total Mortgage' ),
		'id'   => $prefix . 'TotalMortgage',
		'type' => 'text',
		'desc' => 'Total mortgage, e.g 140'
	) );

	/*$cmb_property->add_field(array(
		'name' => __('En Venta'),
		'id' => $prefix . 'forsale',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('En Alquiler'),
		'id' => $prefix . 'forlease',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Preventa'),
		'id' => $prefix . 'preventa',
		'type' => 'text',
	));*/

	//new fields
	$cmb_property->add_field( array(
		'name' => __( 'Active OpenHouse Count' ),
		'id'   => $prefix . 'ActiveOpenHouseCount',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Addl Move In Cost YN' ),
		'id'   => $prefix . 'AddlMoveInCostYN',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Adjusted Area SF' ),
		'id'   => $prefix . 'AdjustedAreaSF',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Agent Alternate Phone' ),
		'id'   => $prefix . 'AgentAlternatePhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Agents Office Extension' ),
		'id'   => $prefix . 'AgentsOfficeExtension',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Amenities' ),
		'id'   => $prefix . 'Amenities',
		'type' => 'text',
		'desc' => 'List of amenities, e.g Elevator,Pool,Trash Chute'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Application Fee' ),
		'id'   => $prefix . 'ApplicationFee',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Approval Information' ),
		'id'   => $prefix . 'ApprovalInformation',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Approximate Lot Size' ),
		'id'   => $prefix . 'ApproximateLotSize',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Approx Sqft Total Area' ),
		'id'   => $prefix . 'ApproxSqftTotalArea',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Assoc Fee Paid Per' ),
		'id'   => $prefix . 'AssocFeePaidPer',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Association Fee' ),
		'id'   => $prefix . 'AssociationFee',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Available Date' ),
		'id'   => $prefix . 'AvailableDate',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Balcony Porchandor Patio YN' ),
		'id'   => $prefix . 'BalconyPorchandorPatioYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Bedroom Description' ),
		'id'   => $prefix . 'BedroomDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Beds Total' ),
		'id'   => $prefix . 'BedsTotal',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Boat Dock Accommodates' ),
		'id'   => $prefix . 'BoatDockAccommodates',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Boat Services' ),
		'id'   => $prefix . 'BoatServices',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Broker Remarks' ),
		'id'   => $prefix . 'BrokerRemarks',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Building Includes' ),
		'id'   => $prefix . 'BuildingIncludes',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Building Name Number' ),
		'id'   => $prefix . 'BuildingNameNumber',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Cable Available YN' ),
		'id'   => $prefix . 'CableAvailableYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Ceiling Height' ),
		'id'   => $prefix . 'CeilingHeight',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Close Date' ),
		'id'   => $prefix . 'CloseDate',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Close Price' ),
		'id'   => $prefix . 'ClosePrice',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'CoList Agent Direct Work Phone' ),
		'id'   => $prefix . 'CoListAgentDirectWorkPhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Co List Agent Email' ),
		'id'   => $prefix . 'CoListAgentEmail',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Co List Agent Full Name' ),
		'id'   => $prefix . 'CoListAgentFullName',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Common Area MaintAmount' ),
		'id'   => $prefix . 'CommonAreaMaintAmount',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Common Area Maint Includes' ),
		'id'   => $prefix . 'CommonAreaMaintIncludes',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Complex Name' ),
		'id'   => $prefix . 'ComplexName',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Construction Type' ),
		'id'   => $prefix . 'ConstructionType',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Cooling Description' ),
		'id'   => $prefix . 'CoolingDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Cost of Sales' ),
		'id'   => $prefix . 'CostofSales',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Development' ),
		'id'   => $prefix . 'Development',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Development Name' ),
		'id'   => $prefix . 'DevelopmentName',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Dining Area Dimensions' ),
		'id'   => $prefix . 'DiningAreaDimensions',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Dining Description' ),
		'id'   => $prefix . 'DiningDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Dining Room Dimensions' ),
		'id'   => $prefix . 'DiningRoomDimensions',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'DOM' ),
		'id'   => $prefix . 'Dom',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Exp Incl Electric YN' ),
		'id'   => $prefix . 'ExpInclElectricYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Expiration Date' ),
		'id'   => $prefix . 'ExpirationDate',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Exterior Features' ),
		'id'   => $prefix . 'ExteriorFeatures',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Fee Description' ),
		'id'   => $prefix . 'FeeDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Flood Zone' ),
		'id'   => $prefix . 'FloodZone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Floor Description' ),
		'id'   => $prefix . 'FloorDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Furn Annual Rent' ),
		'id'   => $prefix . 'FurnAnnualRent',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Heating Description' ),
		'id'   => $prefix . 'HeatingDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Interior Features' ),
		'id'   => $prefix . 'InteriorFeatures',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Internet Remarks' ),
		'id'   => $prefix . 'InternetRemarks',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Internet YN' ),
		'id'   => $prefix . 'InternetYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Lease Term Info' ),
		'id'   => $prefix . 'LeaseTermInfo',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Legal Description' ),
		'id'   => $prefix . 'LegalDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'List Agent Direct Work Phone' ),
		'id'   => $prefix . 'ListAgentDirectWorkPhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'List Agent Email' ),
		'id'   => $prefix . 'ListAgentEmail',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'List Agent Full Name' ),
		'id'   => $prefix . 'ListAgentFullName',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Listing Type' ),
		'id'   => $prefix . 'ListingType',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'List Office Phone' ),
		'id'   => $prefix . 'ListOfficePhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'List Price' ),
		'id'   => $prefix . 'ListPrice',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Location of Property' ),
		'id'   => $prefix . 'LocationofProperty',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Lot Description' ),
		'id'   => $prefix . 'LotDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Main Living Area' ),
		'id'   => $prefix . 'MainLivingArea',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Maintenance Charge Month' ),
		'id'   => $prefix . 'MaintenanceChargeMonth',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Maintenance Fee Includes' ),
		'id'   => $prefix . 'MaintenanceFeeIncludes',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Maintenance Includes' ),
		'id'   => $prefix . 'MaintenanceIncludes',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Maint Fee Paid Per' ),
		'id'   => $prefix . 'MaintFeePaidPer',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Management Company' ),
		'id'   => $prefix . 'ManagementCompany',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Management Company Phone' ),
		'id'   => $prefix . 'ManagementCompanyPhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Management Expense' ),
		'id'   => $prefix . 'ManagementExpense',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Master Bathroom Description' ),
		'id'   => $prefix . 'MasterBathroomDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Minimum Lease Period' ),
		'id'   => $prefix . 'MinimumLeasePeriod',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Minimum Num of Days for Lease' ),
		'id'   => $prefix . 'MinimumNumofDaysforLease',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Miscellaneous' ),
		'id'   => $prefix . 'Miscellaneous',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Num Floors' ),
		'id'   => $prefix . 'NumFloors',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Num Garage Spaces' ),
		'id'   => $prefix . 'NumGarageSpaces',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Num Offices' ),
		'id'   => $prefix . 'NumOffices',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Num Parcels' ),
		'id'   => $prefix . 'NumParcels',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Num Parking Spaces' ),
		'id'   => $prefix . 'NumParkingSpaces',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Num Stories' ),
		'id'   => $prefix . 'NumStories',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Office Fax Number' ),
		'id'   => $prefix . 'OfficeFaxNumber',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'On Site Utilities' ),
		'id'   => $prefix . 'OnSiteUtilities',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Original List Price' ),
		'id'   => $prefix . 'OriginalListPrice',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Parcel Number' ),
		'id'   => $prefix . 'ParcelNumber',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Parking Description' ),
		'id'   => $prefix . 'ParkingDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Patio Balcony Dimensions' ),
		'id'   => $prefix . 'PatioBalconyDimensions',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Pet Restrictions' ),
		'id'   => $prefix . 'PetRestrictions',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Pets Allowed YN' ),
		'id'   => $prefix . 'PetsAllowedYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Pool YN' ),
		'id'   => $prefix . 'PoolYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Property Type Information' ),
		'id'   => $prefix . 'PropertyTypeInformation',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Prop Type Type of Building' ),
		'id'   => $prefix . 'PropTypeTypeofBuilding',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Rental Deposit Includes' ),
		'id'   => $prefix . 'RentalDepositIncludes',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Rental Payment Includes' ),
		'id'   => $prefix . 'RentalPaymentIncludes',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Restrictions' ),
		'id'   => $prefix . 'Restrictions',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Roof' ),
		'id'   => $prefix . 'Roof',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Sale Terms' ),
		'id'   => $prefix . 'SaleTerms',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Security Information' ),
		'id'   => $prefix . 'SecurityInformation',
		'type' => 'text',
		'desc' => 'Security informacion e.g Doorman,Garage Secured,Intercom In Lobby'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Selling Agent Direct Work Phone' ),
		'id'   => $prefix . 'SellingAgentDirectWorkPhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Selling Agent Email' ),
		'id'   => $prefix . 'SellingAgentEmail',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Selling Agent Full Name' ),
		'id'   => $prefix . 'SellingAgentFullName',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Selling Office Name' ),
		'id'   => $prefix . 'SellingOfficeName',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Selling Office Phone' ),
		'id'   => $prefix . 'SellingOfficePhone',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Showing Instructions' ),
		'id'   => $prefix . 'ShowingInstructions',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'SqFtLivArea' ),
		'id'   => $prefix . 'SqFtLivArea',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Spa YN' ),
		'id'   => $prefix . 'SpaYN',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Style' ),
		'id'   => $prefix . 'Style',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Style of Business' ),
		'id'   => $prefix . 'StyleofBusiness',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Style of Property' ),
		'id'   => $prefix . 'StyleofProperty',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Subdivision Complex Bldg' ),
		'id'   => $prefix . 'SubdivisionComplexBldg',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Tenant Pays' ),
		'id'   => $prefix . 'TenantPays',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Total Expenses' ),
		'id'   => $prefix . 'TotalExpenses',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Total Num of Units In Buildin' ),
		'id'   => $prefix . 'TotalNumofUnitsInBuildin',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Total Num of Units In Complex' ),
		'id'   => $prefix . 'TotalNumofUnitsInComplex',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Type of Association' ),
		'id'   => $prefix . 'TypeofAssociation',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Type of Business' ),
		'id'   => $prefix . 'TypeofBusiness',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Unit Number' ),
		'id'   => $prefix . 'UnitNumber',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Unit View' ),
		'id'   => $prefix . 'UnitView',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Utilities Available' ),
		'id'   => $prefix . 'UtilitiesAvailable',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Utility Expense' ),
		'id'   => $prefix . 'UtilityExpense',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Virtual Tour' ),
		'id'   => $prefix . 'VirtualTour',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Water Access' ),
		'id'   => $prefix . 'WaterAccess',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Water front Description' ),
		'id'   => $prefix . 'WaterfrontDescription',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Waterfront Property YN' ),
		'id'   => $prefix . 'WaterfrontPropertyYN',
		'type' => 'text',
		'desc' => '1: Yes / 0: No'
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Water View' ),
		'id'   => $prefix . 'WaterView',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Appliances' ),
		'id'   => $prefix . 'EquipmentAppliances',
		'type' => 'text',
	) );
	$cmb_property->add_field( array(
		'name' => __( 'Property gallery' ),
		'desc' => 'Upload the property photos',
		'id'   => $prefix . 'photos',
		'type' => 'file_list',
	) );

	/****** Presale template field ******/

	$cmb_property->add_field( array(
		'name' => '<div style="background: #23282d;color: #fff;padding: 10px">PRESALE PROPERTIES - HR19</div>',
		'desc' => 'The fields below belong to the properties that will be shown with the template of ALA19',
		'type' => 'title',
		'id'   => 'preventa_title'
	) );

	$cmb_property->add_field( array(
		'name' => 'Use presale template in another type of property/transaction?',
		//'desc' => 'field description (optional)',
		'id'   => $prefix . 'use_template',
		'type' => 'checkbox',
	) );

	$cmb_property->add_field( array(
		'name'         => __( 'Property Image' ),
		'desc'         => 'Upload an image',
		'id'           => $prefix . 'images',
		'type'         => 'file',
		'options'      => array(
			'url' => false,
		),
		'text'         => array(
			'add_upload_file_text' => 'Add image'
		),
		'preview_size' => 'small',
	) );

	// Property Location
	$cmb_property->add_field(
		array(
			'name'       => __( 'Property Location' ),
			'desc'       => __( 'The location of the current property' ),
			'id'         => $prefix . 'price',
			'type'       => 'text',
			'repeatable' => false
		)
	);

	// Property Address
	$cmb_property->add_field(
		array(
			'name'       => __( 'Property Address' ),
			'desc'       => __( 'The address of the current property' ),
			'id'         => $prefix . 'address',
			'type'       => 'text',
			'repeatable' => false
		)
	);

	// Interior Details Text
	$cmb_property->add_field(
		array(
			'name'    => __( 'Interior Details' ),
			'id'      => $prefix . 'intdetails',
			'type'    => 'wysiwyg',
			'options' => array(),
		)
	);

	// Interior Details Gallery
	$cmb_property->add_field(
		array(
			'name'         => __( 'Interior Details Images' ),
			'id'           => $prefix . 'intimages',
			'type'         => 'file_list',
			'preview_size' => array( 100, 100 ),
			'text'         =>
				array(
					'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
					'file_text'             => __( 'Image:' ), // default: "File:"
				),
			'repeatable'   => false
		)
	);

	// Amenities
	$cmb_property->add_field(
		array(
			'name'    => 'Amenities',
			'id'      => $prefix . 'amen',
			'type'    => 'wysiwyg',
			'options' => array(),
		)
	);

	// Amenities Gallery
	$cmb_property->add_field(
		array(
			'name'         => __( 'Amenities Images' ),
			'id'           => $prefix . 'amengallery',
			'type'         => 'file_list',
			'preview_size' => array( 100, 100 ),
			'text'         =>
				array(
					'add_upload_files_text' => __( 'Add or Upload Images' ), // default: "Add or Upload Files"
					'file_text'             => __( 'Image:' ), // default: "File:"
				),
			'repeatable'   => false
		)
	);

	// Plains Carousel
	$cmb_property->add_field(
		array(
			'name'         => __( 'Plains Images / Videos' ),
			'id'           => $prefix . 'plainsgallery',
			'type'         => 'file_list',
			'preview_size' => array( 100, 100 ),
			'text'         =>
				array(
					'add_upload_files_text' => __( 'Add or Upload Images/Videos' ), // default: "Add or Upload Files"
					'file_text'             => __( 'Image/Video:' ), // default: "File:"
				),
			'repeatable'   => false
		)
	);

	// Downloadable Plains
	$cmb_property->add_field( array(
		'name'    => 'Plains (compressed file)',
		'desc'    => 'Upload a .zip file',
		'id'      => $prefix . 'pzip',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
		)
	) );

	$cmb_property->add_field(
		array(
			'name'       => __( 'Plains button text' ),
			'id'         => $prefix . 'pbtn_es_id',
			'type'       => 'text',
			'repeatable' => false,
			'desc'       => 'Example: Descargar Planos / Download plains'
		)
	);

	// Quality Memory
	$cmb_property->add_field(
		array(
			'name'    => 'Quality Memory',
			'id'      => $prefix . 'quality',
			'type'    => 'wysiwyg',
			'options' => array(),
		)
	);

	// Downloadable Memory
	$cmb_property->add_field( array(
		'name'    => __( 'Downloadable Memory' ),
		'desc'    => __( 'Upload file' ),
		'id'      => $prefix . 'memofiles',
		'type'    => 'file',
		'options' => array(
			'url' => false,
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		)
	) );

	$cmb_property->add_field(
		array(
			'name'       => __( 'Memory button text' ),
			'id'         => $prefix . 'mbtn_es_id',
			'type'       => 'text',
			'repeatable' => false,
			'desc'       => 'Example: Descargar Memoria / Download Mememory'
		)
	);

	// Latitude
	$cmb_property->add_field(
		array(
			'name'       => __( 'Latitude' ),
			'id'         => $prefix . 'lat',
			'type'       => 'text',
			'repeatable' => false,
			'desc'       => 'Example: 36.0954894'
		)
	);

	// Longitude
	$cmb_property->add_field(
		array(
			'name'       => __( 'Longitude' ),
			'id'         => $prefix . 'lng',
			'type'       => 'text',
			'repeatable' => false,
			'desc'       => 'Example: -115.1762154'
		)
	);

	// Nearby Places
	/*$cmb_property->add_field( array(
		'name'           => 'List of Nearby Places',
		'desc'           => 'Select one or more places',
		'id'             => 'wiki_test_taxonomy_multicheck',
		'taxonomy'       => 'nearby_places',
		'type'           => 'taxonomy_multicheck_inline',
		'text'           => array(
			'no_terms_text' => 'Sorry, no terms could be found.'
		),
		'remove_default' => 'true' // Removes the default metabox provided by WP core. Pending release as of Aug-10-16
	) );*/

	// Brochure
	$cmb_property->add_field( array(
		'name'         => 'Brochure',
		'desc'         => 'Upload a PDF file',
		'id'           => $prefix . 'brochure',
		'type'         => 'file',
		'options'      => array(
			'url' => false,
		),
		'text'         => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args'   => array(
			'type' => 'application/pdf',
		),
		'preview_size' => 'large',
	) );

	$cmb_property->add_field(
		array(
			'name'       => __( 'Brochure button text' ),
			'id'         => $prefix . 'brochure_es_id',
			'type'       => 'text',
			'repeatable' => false,
			'desc'       => 'Example: Descargar PDF / Download PDF'
		)
	);

	$cmb_property->add_field( array(
		'name'       => 'Property Video',
		'desc'       => 'Enter a Youtube or Vimeo video URL',
		'id'         => $prefix . 'video_embed',
		'type'       => 'oembed',
		'repeatable' => true
	) );

	$cmb_property->add_field(
		array(
			'name'       => __( 'Videos button text' ),
			'id'         => $prefix . 'video_es_id',
			'type'       => 'text',
			'repeatable' => false,
			'desc'       => 'Example:  Ver videos / Watch videos'
		)
	);

}
