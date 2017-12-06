#include "Defense.h"

Defense::Defense()																	//default constructor
{
	firstname = "empty";
	lastname = "empty";
	teamname = "empty";
}

Defense::Defense(string fn, string ln, string tn, int interc, int td, int soloTac, int assisTac, int totTac, int ydsLoss)
{
	firstname = fn;
	lastname = ln;
	teamname = tn;
	interceptions = interc;
	touchdowns = td;
	soloTackles = soloTac;
	assistedTackles = assisTac;
	totalTackles = totTac;
	yardsLoss = ydsLoss;
}

//**********************************Name and Team set/get Functions*******************8


void Defense::SetFirstName(string fn)
{
	firstname = fn;
}

void Defense::SetLastName(string ln)
{
	lastname = ln;
}

void Defense::SetTeamName(string tn)
{
	teamname = tn;
}

string Defense::GetFirstName()
{
	return firstname;
}

string Defense::GetLastName()
{
	return lastname;
}

string Defense::GetTeamName()
{
	return teamname;
}



//*********************************All relevant set/get statistic functions

void Defense::SetInterceptions(int interc)
{
	interceptions = interc;
}

void Defense::SetTouchdowns(int tds)
{
	touchdowns = tds;
}

void Defense::SetSoloTackles(int soloTac)
{
	soloTackles = soloTac;
}

void Defense::SetAssistedTackles(int assisTac)
{
	assistedTackles = assisTac;
}

void Defense::SetTotalTackles(int totTac)
{
	totalTackles = totTac;
}

void Defense::SetTackleForLossYds(int ydsLoss)
{
	yardsLoss = ydsLoss;
}

int Defense::GetInterceptions()
{
	return interceptions;
}

int Defense::GetTouchdowns()
{
	return touchdowns;
}

int Defense::GetSoloTackles()
{
	return soloTackles;
}

int Defense::GetAssistedTackles()
{
	return assistedTackles;
}

int Defense::GetTotalTackles()
{
	return totalTackles;
}

int Defense::GetTackleForLossYds()
{
	return yardsLoss;
}

//********************************************All get and set functions for stat Rankings*************************************
void Defense::SetInterceptionsRank(int rank)
{
	interceptionsRank = rank;
}

void Defense::SetTouchdownsRank(int rank)
{
	touchdownsRank = rank;
}

void Defense::SetSoloTacklesRank(int rank)
{
	soloTacklesRank = rank;
}

void Defense::SetAssistedTacklesRank(int rank)
{
	assistedTacklesRank = rank;
}

void Defense::SetTotalTacklesRank(int rank)
{
	totalTacklesRank = rank;
}

void Defense::SetTackleForLossYdsRank(int rank)
{
	yardsLossRank = rank;
}

int Defense::GetInterceptionsRank()
{
	return interceptionsRank;
}

int Defense::GetTouchdownsRank()
{
	return touchdownsRank;
}

int Defense::GetSoloTacklesRank()
{
	return soloTacklesRank;
}

int Defense::GetAssistedTacklesRank()
{
	return assistedTacklesRank;
}

int Defense::GetTotalTacklesRank()
{
	return totalTacklesRank;
}

int Defense::GetTackleForLossYdsRank()
{
	return yardsLossRank;
}