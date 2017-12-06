<?php

function property_metaboxes() {

	$prefix = '_pr_';

	$cmb_property = new_cmb2_box(
		array(
			'id' => 'propertyinfo',
			'title' => __('Property Extra Information'),
			'object_types' => 'property',
			'context' => 'normal',
			'priority' => 'high'
		)
	);

	$cmb_property->add_field(array(
		'name' => __('State'),
		'id' => $prefix . 'state',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('City'),
		'id' => $prefix . 'city',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Community'),
		'id' => $prefix . 'community',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Subdivision'),
		'id' => $prefix . 'subdiv',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Address'),
		'id' => $prefix . 'address',
		'type' => 'text',
	));

	$cmb_property->add_field(
		array(
			'name' => __('Property Price'),
			'id' => $prefix . 'current_price',
			'type' => 'text_money'
		)
	);

	$cmb_property->add_field(array(
		'name' => __('Type of Property'),
		'id' => $prefix . 'type_of_property',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Rooms'),
		'id' => $prefix . 'room_count',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Baths'),
		'id' => $prefix . 'baths_total',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Baths Full'),
		'id' => $prefix . 'baths_full',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Baths Half'),
		'id' => $prefix . 'baths_half',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Square FT'),
		'id' => $prefix . 'sqft',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Surface'),
		'id' => $prefix . 'surf',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('HOA Fees'),
		'id' => $prefix . 'hoa',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Year Built'),
		'id' => $prefix . 'yearbuilt',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Agent ID'),
		'id' => $prefix . 'agentid',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Matrix ID'),
		'id' => $prefix . 'matrixid',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Estatus'),
		'id' => $prefix . 'status',
		'type' => 'text',
	));

	$cmb_property->add_field(array(
		'name' => __('Tipo de Transacci&oacute;n'),
		'id' => $prefix . 'transaction',
		'type' => 'text',
	));

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


	$cmb_property->add_field(array(
		'name' => __('Codigo Postal'),
		'id' => $prefix . 'postalcode',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Propietario'),
		'id' => $prefix . 'owner',
		'type' => 'text',
	));

	//new fields
	$cmb_property->add_field(array(
		'name' => __('Active OpenHouse Count'),
		'id' => $prefix . 'ActiveOpenHouseCount',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Addl Move In Cost YN'),
		'id' => $prefix . 'AddlMoveInCostYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Adjusted Area SF'),
		'id' => $prefix . 'AdjustedAreaSF',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Agent Alternate Phone'),
		'id' => $prefix . 'AgentAlternatePhone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Agents Office Extension'),
		'id' => $prefix . 'AgentsOfficeExtension',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Amenities'),
		'id' => $prefix . 'Amenities',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Application Fee'),
		'id' => $prefix . 'ApplicationFee',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Approval Information'),
		'id' => $prefix . 'ApprovalInformation',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Approximate Lot Size'),
		'id' => $prefix . 'ApproximateLotSize',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Approx Sqft Total Area'),
		'id' => $prefix . 'ApproxSqftTotalArea',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Assoc Fee Paid Per'),
		'id' => $prefix . 'AssocFeePaidPer',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Association Fee'),
		'id' => $prefix . 'AssociationFee',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Available Date'),
		'id' => $prefix . 'AvailableDate',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Balcony Porchandor Patio YN'),
		'id' => $prefix . 'BalconyPorchandorPatioYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Bedroom Description'),
		'id' => $prefix . 'BedroomDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Beds Total'),
		'id' => $prefix . 'BedsTotal',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Boat Dock Accommodates'),
		'id' => $prefix . 'BoatDockAccommodates',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Boat Services'),
		'id' => $prefix . 'BoatServices',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Broker Remarks'),
		'id' => $prefix . 'BrokerRemarks',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Building Includes'),
		'id' => $prefix . 'BuildingIncludes',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Building Name Number'),
		'id' => $prefix . 'BuildingNameNumber',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Cable Available YN'),
		'id' => $prefix . 'CableAvailableYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Ceiling Height'),
		'id' => $prefix . 'CeilingHeight',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Close Date'),
		'id' => $prefix . 'CloseDate',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Close Price'),
		'id' => $prefix . 'ClosePrice',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('CoList Agent Direct Work Phone'),
		'id' => $prefix . 'CoListAgentDirectWorkPhone',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Co List Agent Email'),
		'id' => $prefix . 'CoListAgentEmail',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Co List Agent Full Name'),
		'id' => $prefix . 'CoListAgentFullName',
		'type' => 'text',
	));	$cmb_property->add_field(array(
		'name' => __('Common Area MaintAmount'),
		'id' => $prefix . 'CommonAreaMaintAmount',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Common Area Maint Includes'),
		'id' => $prefix . 'CommonAreaMaintIncludes',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Complex Name'),
		'id' => $prefix . 'ComplexName',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Construction Type'),
		'id' => $prefix . 'ConstructionType',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Cooling Description'),
		'id' => $prefix . 'CoolingDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Cost of Sales'),
		'id' => $prefix . 'CostofSales',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Development'),
		'id' => $prefix . 'Development',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Development Name'),
		'id' => $prefix . 'DevelopmentName',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Dining Area Dimensions'),
		'id' => $prefix . 'DiningAreaDimensions',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Dining Description'),
		'id' => $prefix . 'DiningDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Dining Room Dimensions'),
		'id' => $prefix . 'DiningRoomDimensions',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('DOM'),
		'id' => $prefix . 'Dom',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Exp Incl Electric YN'),
		'id' => $prefix . 'ExpInclElectricYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Expiration Date'),
		'id' => $prefix . 'ExpirationDate',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Exterior Features'),
		'id' => $prefix . 'ExteriorFeatures',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Fee Description'),
		'id' => $prefix . 'FeeDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Flood Zone'),
		'id' => $prefix . 'FloodZone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Floor Description'),
		'id' => $prefix . 'FloorDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Furn Annual Rent'),
		'id' => $prefix . 'FurnAnnualRent',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Heating Description'),
		'id' => $prefix . 'HeatingDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Interior Features'),
		'id' => $prefix . 'InteriorFeatures',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Internet Remarks'),
		'id' => $prefix . 'InternetRemarks',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Internet YN'),
		'id' => $prefix . 'InternetYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Lease Term Info'),
		'id' => $prefix . 'LeaseTermInfo',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Legal Description'),
		'id' => $prefix . 'LegalDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('List Agent Direct Work Phone'),
		'id' => $prefix . 'ListAgentDirectWorkPhone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('List Agent Email'),
		'id' => $prefix . 'ListAgentEmail',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('List Agent Full Name'),
		'id' => $prefix . 'ListAgentFullName',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Listing Type'),
		'id' => $prefix . 'ListingType',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('List Office Phone'),
		'id' => $prefix . 'ListOfficePhone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('List Price'),
		'id' => $prefix . 'ListPrice',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Location of Property'),
		'id' => $prefix . 'LocationofProperty',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Lot Description'),
		'id' => $prefix . 'LotDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Main Living Area'),
		'id' => $prefix . 'MainLivingArea',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Maintenance Charge Month'),
		'id' => $prefix . 'MaintenanceChargeMonth',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Maintenance Fee Includes'),
		'id' => $prefix . 'MaintenanceFeeIncludes',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Maintenance Includes'),
		'id' => $prefix . 'MaintenanceIncludes',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Maint Fee Paid Per'),
		'id' => $prefix . 'MaintFeePaidPer',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Management Company'),
		'id' => $prefix . 'ManagementCompany',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Management Company Phone'),
		'id' => $prefix . 'ManagementCompanyPhone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Management Expense'),
		'id' => $prefix . 'ManagementExpense',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Master Bathroom Description'),
		'id' => $prefix . 'MasterBathroomDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Minimum Lease Period'),
		'id' => $prefix . 'MinimumLeasePeriod',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Minimum Num of Days for Lease'),
		'id' => $prefix . 'MinimumNumofDaysforLease',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Miscellaneous'),
		'id' => $prefix . 'Miscellaneous',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Num Floors'),
		'id' => $prefix . 'NumFloors',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Num Garage Spaces'),
		'id' => $prefix . 'NumGarageSpaces',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Num Offices'),
		'id' => $prefix . 'NumOffices',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Num Parcels'),
		'id' => $prefix . 'NumParcels',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Num Parking Spaces'),
		'id' => $prefix . 'NumParkingSpaces',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Num Stories'),
		'id' => $prefix . 'NumStories',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Office Fax Number'),
		'id' => $prefix . 'OfficeFaxNumber',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('On Site Utilities'),
		'id' => $prefix . 'OnSiteUtilities',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Original List Price'),
		'id' => $prefix . 'OriginalListPrice',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Parcel Number'),
		'id' => $prefix . 'ParcelNumber',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Parking Description'),
		'id' => $prefix . 'ParkingDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Patio Balcony Dimensions'),
		'id' => $prefix . 'PatioBalconyDimensions',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Pet Restrictions'),
		'id' => $prefix . 'PetRestrictions',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Pets Allowed YN'),
		'id' => $prefix . 'PetsAllowedYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Pool YN'),
		'id' => $prefix . 'PoolYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Property Type Information'),
		'id' => $prefix . 'PropertyTypeInformation',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Prop Type Type of Building'),
		'id' => $prefix . 'PropTypeTypeofBuilding',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Rental Deposit Includes'),
		'id' => $prefix . 'RentalDepositIncludes',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Rental Payment Includes'),
		'id' => $prefix . 'RentalPaymentIncludes',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Restrictions'),
		'id' => $prefix . 'Restrictions',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Roof'),
		'id' => $prefix . 'Roof',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Sale Terms'),
		'id' => $prefix . 'SaleTerms',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Security Information'),
		'id' => $prefix . 'SecurityInformation',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Selling Agent Direct Work Phone'),
		'id' => $prefix . 'SellingAgentDirectWorkPhone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Selling Agent Email'),
		'id' => $prefix . 'SellingAgentEmail',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Selling Agent Full Name'),
		'id' => $prefix . 'SellingAgentFullName',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Selling Office Name'),
		'id' => $prefix . 'SellingOfficeName',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Selling Office Phone'),
		'id' => $prefix . 'SellingOfficePhone',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Showing Instructions'),
		'id' => $prefix . 'ShowingInstructions',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('SqFtLivArea'),
		'id' => $prefix . 'SqFtLivArea',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Spa YN'),
		'id' => $prefix . 'SpaYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Style'),
		'id' => $prefix . 'Style',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Style of Business'),
		'id' => $prefix . 'StyleofBusiness',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Style of Property'),
		'id' => $prefix . 'StyleofProperty',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Subdivision Complex Bldg'),
		'id' => $prefix . 'SubdivisionComplexBldg',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Tenant Pays'),
		'id' => $prefix . 'TenantPays',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Total Expenses'),
		'id' => $prefix . 'TotalExpenses',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Total Num of Units In Buildin'),
		'id' => $prefix . 'TotalNumofUnitsInBuildin',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Total Num of Units In Complex'),
		'id' => $prefix . 'TotalNumofUnitsInComplex',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Type of Association'),
		'id' => $prefix . 'TypeofAssociation',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Type of Business'),
		'id' => $prefix . 'TypeofBusiness',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Unit Number'),
		'id' => $prefix . 'UnitNumber',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Unit View'),
		'id' => $prefix . 'UnitView',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Utilities Available'),
		'id' => $prefix . 'UtilitiesAvailable',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Utility Expense'),
		'id' => $prefix . 'UtilityExpense',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Virtual Tour'),
		'id' => $prefix . 'VirtualTour',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Water Access'),
		'id' => $prefix . 'WaterAccess',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Water front Description'),
		'id' => $prefix . 'WaterfrontDescription',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Waterfront Property YN'),
		'id' => $prefix . 'WaterfrontPropertyYN',
		'type' => 'text',
	));
	$cmb_property->add_field(array(
		'name' => __('Water View'),
		'id' => $prefix . 'WaterView',
		'type' => 'text',
	));

}
