[![Build Status](https://travis-ci.org/svpernova09/SvperCRM.svg?branch=master)](https://travis-ci.org/svpernova09/SvperCRM)

## SvperCRM

A CRM Solution built on the Laravel PHP Framework

This is a work in progress based on specific requirements of an agency. This may not be the solution for you.

Bug Reports and Pull Requests are encouraged. The primary agency needs will always be a factor.

## Specifications

### Organizations

* 1 to Many with People
* 1 to many with Support Contracts
* 1 to Many with Credentials
* Can be designated as an Agency and related to other Organizations by agency_id

####Fields:

* Name
* Address
* Phone
* Set a Person as "primary contact"
* Primary Salesperson
* Primary Account Manager
* Agency Id
* Comments


### Person / People

* 1 to 1 with Organizations
* Can be set as Salesperson / Account Manager / Designer / Deveoper / Strategiest on an Organization?

####Fields:

* Name
* Address
* Office Phone
* Mobile Phone
* Comments
