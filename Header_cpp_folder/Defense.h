#include <iostream>
#include <iomanip>
#include <vector>
#include <string>
using namespace std;

class Defense
{

public:
	Defense();																	//default constructor
	Defense(string fn, string ln, string tn, int interc, int td, int soloTac, int assisTac, int totTac, int ydsLoss);

	void SetFirstName(string fn);							//set and get functions for name
	void SetLastName(string ln);
	void SetTeamName(string tn);

	string GetFirstName();
	string GetLastName();
	string GetTeamName();
			
	void SetInterceptions(int interc);						//all relevant set and get functions for stats
	void SetTouchdowns(int tds);
	void SetSoloTackles(int soloTac);
	void SetAssistedTackles(int assisTac);
	void SetTotalTackles(int totTac);
	void SetTackleForLossYds(int ydsLoss);

	int GetInterceptions();
	int GetTouchdowns();
	int GetSoloTackles();
	int GetAssistedTackles();
	int GetTotalTackles();
	int GetTackleForLossYds();

	void SetInterceptionsRank(int );						//all relevant set and get functions for RANKINGS
	void SetTouchdownsRank(int );
	void SetSoloTacklesRank(int );
	void SetAssistedTacklesRank(int );
	void SetTotalTacklesRank(int );
	void SetTackleForLossYdsRank(int );

	int GetInterceptionsRank();
	int GetTouchdownsRank();
	int GetSoloTacklesRank();
	int GetAssistedTacklesRank();
	int GetTotalTacklesRank();
	int GetTackleForLossYdsRank();

private:
	string firstname, lastname, teamname;
	int interceptions, touchdowns, soloTackles, assistedTackles, totalTackles, yardsLoss;
	int interceptionsRank, touchdownsRank, soloTacklesRank, assistedTacklesRank, totalTacklesRank, yardsLossRank;
};