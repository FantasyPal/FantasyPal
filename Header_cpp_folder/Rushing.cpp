#include "Rushing.h"


Rushing::Rushing()
{
	firstname = "empty";
	lastname = "empty";
	teamname = "empty";
}

Rushing::Rushing(string fn, string ln, string tn, int game, int att,
	int yar, double YPC, double YPG, int LG, int td, int fd)
{
	firstname = fn;
	lastname = ln;
	teamname = tn;
	SetGames(game);
	SetAttempts(att);
	SetYards(yar);
	SetAverageYardsPerCarry(YPC);
	SetYardsPerGame(YPG);
	SetLongestGain(LG);
	SetTouchdowns(td);
	SetFirstDowns(fd);
}

//**********************************Name/Team Relevant functions***************************

void Rushing::SetFirstName(string fn)
{
	firstname = fn;
}

void Rushing::SetLastName(string ln)
{
	lastname = ln;
}

void Rushing::SetTeamName(string tn)
{
	teamname = tn;
}

string Rushing::GetTeamName()
{
	return teamname;
}

string Rushing::GetFirstName()
{
	return firstname;
}

string Rushing::GetLastName()
{
	return lastname;
}

//********************************ALL stat relevant functions********************

void Rushing::SetGames(int gm)
{
	games = gm;
}

void Rushing::SetAttempts(int att)
{
	attempts = att;
}

void Rushing::SetYards(int yd)
{
	yards = yd;
}

void Rushing::SetAverageYardsPerCarry(double YPC)
{
	AvgYPC = YPC;
}


void Rushing::SetYardsPerGame(double YPG)
{
	YPG = YPG;
}

void Rushing::SetLongestGain(int LG)
{
	LongestGain = LG;
}

void Rushing::SetTouchdowns(int td)
{
	touchdowns = td;
}


void Rushing::SetFirstDowns(int fd)
{
	firstdowns = fd;
}

int Rushing::GetGames()
{
	return games;
}

int Rushing::GetAttempts()
{
	return attempts;
}

int Rushing::GetYards()
{
	return yards;
}

double Rushing::GetAverageYardsPerCarry()
{
	return AvgYPC;
}

double Rushing::GetYardsPerGame()
{
	return YPG;
}

int Rushing::GetLongestGain()
{
	return LongestGain;
}

int Rushing::GetTouchdowns()
{
	return touchdowns;
}

int Rushing::GetFirstDowns()
{
	return firstdowns;
}

//*************************************ALL STAT RANKING FUNCTIONS********************************
void Rushing::SetGamesRank(int rank)
{
	gamesRank = rank;
}

void Rushing::SetAttemptsRank(int rank)
{
	attemptsRank = rank;
}

void Rushing::SetYardsRank(int rank)
{
	yardsRank = rank;
}

void Rushing::SetAverageYardsPerCarryRank(int rank)
{
	AvgYPCRank = rank;
}

void Rushing::SetYardsPerGameRank(int rank)
{
	YPGRank = rank;
}

void Rushing::SetLongestGainRank(int rank)
{
	LongestGainRank = rank;
}

void Rushing::SetTouchdownsRank(int rank)
{
	touchdownsRank = rank;
}

void Rushing::SetFirstDownsRank(int rank)
{
	firstdownsRank = rank;
}

int Rushing::GetGamesRank()
{
	return gamesRank;
}

int Rushing::GetAttemptsRank()
{
	return attemptsRank;
}

int Rushing::GetYardsRank()
{
	return yardsRank;
}

int Rushing::GetAverageYardsPerCarryRank()
{
	return AvgYPCRank;
}

int Rushing::GetYardsPerGameRank()
{
	return YPGRank;
}

int Rushing::GetLongestGainRank()
{
	return LongestGainRank;
}

int Rushing::GetTouchdownsRank()
{
	return touchdownsRank;
}

int Rushing::GetFirstDownsRank()
{
	return firstdownsRank;
}