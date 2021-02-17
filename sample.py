testcases=int(input())
for testcase in range(testcases):
    string=str(input())
    multiplier=0
    solution=0
    kick="KICK"
    start="START"
    for i in range(len(string)-4):
        if string[i]=='K':
            k=1
            isKick=True
            while k<3:
                if kick[k]!=string[k+i]:
                    isKick=False
                    break
                k+=1
            if isKick:
                i+=(k-1)
                multiplier+=1
        elif string[i]=='S':
            s=0
            isStart=True
            while s<5:
                if start[s]!=string[s+i]:
                    isStart=False
                    break
                s+=1
            if isStart:
                i+=(s-1)
                solution+=multiplier
    print("Case #"+str(testcase+1)+": "+str(solution))
                
        
