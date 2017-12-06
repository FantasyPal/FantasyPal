#include <iostream>
#include <iomanip>
#include <vector>
#include <string>
using namespace std;

class Rushing
{
public:
	Rushing();							//Default Constructor
	Rushing(string fn, string ln, string tn, int game, int att,
		int yar, double YPC, double YPG, int LG, int td, int fd);

	void SetFirstName(string fn);							//set and get functions for name
	void SetLastName(string ln);
	void SetTeamName(string tn);

	string GetFirstName();
	string GetLastName();
	string GetTeamName();

	void SetGames(int games);			//Set functions and get functions for relevant stats
	void SetAttempts(int attempts);
	void SetYards(int yards);
	void SetAverageYardsPerCarry(double AvgYPC);
	void SetYardsPerGame(double YPG);
	void SetLongestGain(int LongestGain);
	void SetTouchdowns(int touchdowns);
	void SetFirstDowns(int firstdowns);

	int GetGames();		
	int GetAttempts();
	int GetYards();
	double GetAverageYardsPerCarry();
	double GetYardsPerGame();
	int GetLongestGain();
	int GetTouchdowns();
	int GetFirstDowns();

										//Set functions and get functions for stat Ranks
	void SetGamesRank(int );			
	void SetAttemptsRank(int );
	void SetYardsRank(int );
	void SetAverageYardsPerCarryRank(int );
	void SetYardsPerGameRank(int );
	void SetLongestGainRank(int );
	void SetTouchdownsRank(int );
	void SetFirstDownsRank(int );

	int GetGamesRank();
	int GetAttemptsRank();
	int GetYardsRank();
	int GetAverageYardsPerCarryRank();
	int GetYardsPerGameRank();
	int GetLongestGainRank();
	int GetTouchdownsRank();
	int GetFirstDownsRank();





private:
	int games, attempts, yards, LongestGain, touchdowns, firstdowns;	
	double AvgYPC, YPG;
	string firstname, lastname, teamname;

	int gamesRank, attemptsRank, yardsRank, LongestGainRank, touchdownsRank, firstdownsRank, AvgYPCRank, YPGRank;
};